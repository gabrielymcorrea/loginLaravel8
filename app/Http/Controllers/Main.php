<?php

namespace App\Http\Controllers;


use App\Http\Requests\LoginRequest;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Main extends Controller
{
    public function index(){

        //verificar se está ou não logado
        if($this->checkSession()){ //esta perguntando se existe uma varial usuario na session
            return redirect()->route('home');
        }else{
            return redirect()->route('login');
        }
    }

    //a sesao tem um usuario? tem alguem logado
    private function checkSession(){
       return session()->has('usuario');
    }


    //apresentar o formulario de login
    public function login(){
        //verifica se ja existe sessao, se ja esta logado
        if($this->checkSession()){
            return redirect()->route('index');
        }

        //perguntando se existe uma variavel erro na session
        $erro = session('erro');
        $data = [];

        //se nao estiver vazio
        if(!empty($erro)){
            $data = [
                'erro' => $erro
            ];
        }

        return view('login', $data);
    }

    //esta function que é chamado do formulario, quando o usuario aberta o botao entrar
    public function login_submit(LoginRequest $request){
        //verifica se houve submissao de formulario
        if(!$request -> isMethod('post')){
            return redirect()->route('index');
        }

        //verificacao se ja existe sessao
        if($this->checkSession()){
            return redirect()->route('index');
        }

        //validação
        $request->validated();

        //verificar dados do login
        $usuario = trim($request->input('text_usuario')); //buscar o valor que foi inserido no input text_usuario
        $senha = trim($request->input('text_senha')); //trim tirar/ignora o espaço no começo e no final

        //buscando o usuario no banco de dados
        $usuario = Usuario::where('usuario', $usuario)->first();

        //if se nao tiver o usuario na base de dados, verifica primeiro o usuario
        if(!$usuario){
            //nosso erro, o validate nao mexe
            //flash permite colocar a varialvel na sessao temporariamente, e assim apenas usar uma unica vez
            session()->flash('erro', 'Não existe o usuario.'); // erro variavel, outro paramentro mensagem
            return redirect()->route('login');
        }


        //verificar se a senha esta correta
        //hash::check verifica, valor cripficado, a $senha é de $senha,e  usario->senha é do if acima verficando o usuario
        if(!Hash::check($senha, $usuario->senha)){ 
            session()->flash('erro', 'Senha inválida.'); // erro variavel, outro paramentro mensagem
            return redirect()->route('login');
        }


        //criar a sessao (se login ok)
        session()->put('usuario', $usuario);
        return redirect()->route('index');
    }

     //sair
    public function logout(){
        //forget significa esqueça essa variavel na sessao
        //desconectando 
        session()->forget('usuario');
        return redirect()->route('index');
    }

    //home
    public function home(){
        if(!$this->checkSession()){
            return redirect()->route('login');
        }

        return view('home');
    }

   
}
