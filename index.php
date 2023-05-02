 <?php 
 
 
 if (file_exists('configuracao/index.php')) {
  
  include("configuracao/index.php");
  
  
} else {
    
    include("top.php"); 
    
    
    if(empty($_GET['bt'])){$bt = "land";}else{ $bt = $_GET['bt'];}
        
        
         
        if($bt == "land"){
            
			include("modulos/usuario/paginas/login.php");
            //include("landpage.php");
            
        }
       
        
        if($bt == "login"){
            
            include("modulos/usuario/paginas/login.php");
            
        }
        if($bt == "cadastro"){
            
            include("modulos/usuario/paginas/cadastrar.php");
            
        }
        if($bt == "recuperacao"){
            
            include("modulos/usuario/paginas/recuperar_senha.php");
            
        }
        
        if($bt == "nova_os"){
            include("modulos/ordem_de_servico/pagina/nova_os.php");
        }
        
         if($bt == "acompanhar_os"){
            include("modulos/ordem_de_servico/pagina/acompanhar_os.php");
        }
   
 include("bottom.php");
}
 

 

    
    
    ?>
    
    