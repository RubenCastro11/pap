<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publicidade;

class PublicidadeController extends Controller
{
    public function index(){
    	$publicidade=Publicidade::with('mota')->get();
       // dd($publicidade);
    	return view('publicidade.index',[
    		'publicidade'=>$publicidade
    	]);

    }
    public function show(Request $request){
        $idpublicidade=$request->id;
        $publicidade=Publicidade::where('id_publicidade',$idpublicidade)->first();
         return view('publicidade.show',[
            'publicidade'=>$publicidade
         ]);
   }

     public function create(){
           return view('publicidade.create');
     }






      public function store(Request $request){
        $novoPublicidade=$request->validate([
            'id_mota'=>['required','numeric'],
            'designacao'=>['required','min:0'],
            'fotografia'=>['required','image','max:2000'],
            
          ]);
        

        if ($request->hasFile('fotografia')){
            $nomeimagem = $request->file('fotografia')->getClientOriginalName();
            
            $nomeImagem = time(). '_'. $nomeimagem;
            $guardarImagem = $request->file('fotografia')->storeAs('imagens/publicidade',$nomeImagem);
            
            $novoPublicidade['fotografia']=$nomeImagem;

        }
        $publicidade = Publicidade::create($novoPublicidade);
        return redirect()->route('publicidades.show',[
          'id'=>$publicidade->id_publicidade
        ]);
}



        public function update (Request $request){
            $idpublicidade=$request->id_publicidade;
            $publicidade=Publicidade::findOrFail($idpublicidade);

            $atualizarpublicidade=$request->validate([

            'id_mota'=>['required','numeric'],
            'designacao'=>['required','min:0'],
            'fotografia'=>['nullable','image','max:2000'],
            ]);
            if($request->hasFile('fotografia')){
                $nomeImagem=$request->file('fotografia')->getClientOriginalName();
                $nomeImagem=time().'_'.$nomeImagem;
                $guardarImagem=$request->file('fotografia')->storeAs('imagens/publicidade',$nomeImagem);
                $atualizarpublicidade['fotografia']=$nomeImagem;
            }
            $publicidade->update($atualizarpublicidade);
        
        return redirect()->route('publicidades.show',[
            'id'=>$publicidade->id_publicidade
        ]);
        }

        public function edit(Request $request){
        $idpublicidade=$request->id_publicidade; 
        $publicidade=Publicidade::where('id_publicidade',$idpublicidade)->first();
        return view('publicidade.edit',[
            'publicidade'=>$publicidade
        ]);     
    }
    public function delete(Request $request){
        $idpublicidade=$request->id_publicidade;
        $publicidade=Publicidade::where('id_publicidade',$idpublicidade)->first();
        
            if(is_null($publicidade)){
                return redirect()->route('publicidades.index');
            }
            else
            {
                return view('Publicidade.delete',[
                    'publicidade'=>$publicidade
                ]);
            }
        }
    
    public function destroy(Request $request){
        $idpublicidade=$request->id_publicidade;
        $publicidade=Publicidade::where('id_publicidade',$idpublicidade)->first();
        
            if(is_null($publicidade)){
                return redirect()->route('publicidades.index');
            }
            else
            {
                $publicidade->delete();
                return redirect()->route('publicidades.index')->with('mensagem','Publicidade eliminada!');
            }
        }    
    }
 
