/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package vista;
import Controlador.*;
import Controlador.administrador;
import java.util.Scanner;

/**
 *
 * @author usuario 1
 */
public class Vista {
      public static  Usuario newUsuario;
      public  static String Nombre;
    /**
     * @param args the command line arguments
     */
     
    public static void main(String[] args) {
        Vista.Menu_Principal();
    }
        
    public static void Menu_Principal(){
        int n=1;
       Scanner opc=new Scanner(System.in);
         while(n>0){
             
        System.out.println("         Bienvenido a MIchidogs");
        System.out.println("===========================================");
        System.out.print("1-Iniciar Sesion ");
        System.out.println("         2-Registrarse");
             System.out.println(" ");
             System.out.println("      3-Recuperar la contraseña ");
        System.out.println("");
        int opcion=opc.nextInt();
        if(opcion==1){
          Vista.iniciarSesion();
        }
        else if(opcion==2){
         Vista.Registrarse();
        }
        else if(opcion==3){
            administrador.recuperar_Contraseña();
        }
        
    }}
    
    
    public static void Registrarse(){
        System.out.println(" ");
        System.out.println(" ");
        System.out.println("1-Registrar administrador ");
        System.out.println("2-Registrar_Cliente ");
        System.out.println("3-Registrar Proveedor ");
       Scanner opc=new Scanner(System.in);
        int opcion=opc.nextInt();
          switch (opcion) {
              case 1:
                  administrador.Registro_Admin();
                  break;
              case 2:
                  Usuario.registro();
                  break;
              case 3:
                  Usuario.registro();
                  break;
              default:
                  break;
          }
    }


   public static void iniciarSesion(){
       System.out.println(" ");
       System.out.println(" ");
       System.out.println("1-Iniciar sesion como Administrador: ");
       System.out.println("2-Iniciar sesion como provedor");
       System.out.println("3-Iniciar sesion como comprador ");

        Scanner opc=new Scanner(System.in);
        int opcion=opc.nextInt();
          switch (opcion) {
              case 1:
                    administrador.IniciarSesion(); 
                  break;
              case 2:
                  Proveedor.IniciarSesion();
                  break;
              case 3:
                 
                  break;
              default:
                  break;
          }
}
   
      public static void MostrarRegistro(){
        System.out.println("1-MostraRegistro administrador ");
        System.out.println("2-MostrarRegistro Cliente_Comprador ");
        System.out.println("3-MostrarRegistro Proveedor");
       Scanner opc=new Scanner(System.in);
        int opcion=opc.nextInt();
          switch (opcion) {
              case 1:
                  
                  break;
              case 2:
                  Cliente.MostrarCliente_Comprador();
                  break;
              case 3:
                  Proveedor.MostrarProveedor();
                  break;
              default:
                  break;
          }
       
   }
      
   public static void Menu_Administrador(){
        int n=1;
       Scanner opc=new Scanner(System.in);
         while(n>0){
             
    
    System.out.println("====================================================================================");
        System.out.print("1-Realizar Consulta Base de datos: ");
        System.out.println("         2-Desactivar  o activar usuario");
             System.out.println(" ");
             System.out.print("      3-Cambiar la contraseña ");
             System.out.println("    4-salir de la cuenta");
        System.out.println("");
        int opcion=opc.nextInt();
        if(opcion==1){

          administrador.consultarBaseDatos();
        }
        else if(opcion==2){
         Vista.Registrarse();
        }
        else if (opcion==3){
            administrador.recuperar_Contraseña();
        }        
        else if (opcion==4){
            Vista.Menu_Principal();
        }
        
    }
   }
   
 public static void Menu_Cliente_Comprador (){
      int n=1;
       Scanner opc=new Scanner(System.in);
         while(n>0){
             
    
    System.out.println("====================================================================================");
        System.out.print("1-Comprar Producto  ");
        System.out.println("         2-Cambiar datos personales");
             System.out.println(" ");
             System.out.print("      3-Cambiar la contraseña ");
             System.out.println("    4-salir de la cuenta");
        System.out.println("");
        int opcion=opc.nextInt();
        if(opcion==1){

          administrador.consultarBaseDatos();
        }
        if(opcion==2){
         Vista.Registrarse();
        }
        
    }
 }
 
 public static void Menu_Proveedor(){
      int n=1;
       Scanner opc=new Scanner(System.in);
         while(n>0){
             
    
    System.out.println("====================================================================================");
        System.out.print("1-Agregar producto  ");
        System.out.println("         2-Cambiar datos personales");
             System.out.println(" ");
             System.out.print("      3-Cambiar la contraseña ");
             System.out.println("    4-salir de la cuenta");
        System.out.println("");
        int opcion=opc.nextInt();
        if(opcion==1){
        }
        else if(opcion==2){
        Proveedor.cambiar_datos_personales();
        }
        else if (opcion==3){
        Proveedor.recuperar_Contraseña();
    }
        else if (opcion==4){
            Vista.Menu_Principal();
        }
 }

 }
 public static void Menu_cliente_comprador(){
      int n=1;
       Scanner opc=new Scanner(System.in);
         while(n>0){
             
    
    System.out.println("====================================================================================");
        System.out.print("1-Comprar Producto  ");
        System.out.println("         2-Cambiar datos personales");
             System.out.println(" ");
             System.out.print("      3-Cambiar la contraseña ");
             System.out.println("    4-salir de la cuenta");
        System.out.println("");
        int opcion=opc.nextInt();
        if(opcion==1){

          administrador.consultarBaseDatos();
        }
        if(opcion==2){
         Vista.Registrarse();
        }
        
    }
 }}