    /*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Controlador;

import static Controlador.Usuario.conexion;
import vista.Vista;
import java.sql.ResultSet;
import java.sql.ResultSetMetaData;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.Scanner;

/**
 *
 * @author usuario 1
 */
public class Proveedor{
    public String Rut_proveedor;
     public static int id_proveedor=0;
    

    public static Scanner teclado = new Scanner(System.in);
    public  static void MostrarProveedor() {
        Statement sentencia;
        
        try{
          sentencia =conexion.getConexionBD().createStatement();
          ResultSet resultado = sentencia.executeQuery("select * from proveedor");
          ResultSetMetaData campos = resultado.getMetaData();
          int Cantidadcolumnas =campos.getColumnCount();
          for(int i=1; i<=Cantidadcolumnas;i++){
              System.out.print(" "+campos.getColumnLabel(i)+ "        ");
          }
            System.out.println(" ");
            while(resultado.next()){
                for (int i=0; i<Cantidadcolumnas;i++){
                    System.out.print(" "+resultado.getObject(i +1) +"            " );
                
                }
                System.out.println(" ");
            }
            resultado.close();
            
        }catch (SQLException e){
            System.out.println(" "+ "error SQl "+ e);
        }catch(Exception e){
            System.out.println(" "+"error " + e);
        }
    }
   
     public  static void IniciarSesion() {
        Statement sentencia;
        Statement sentencia2;
        Statement sentencia3;
        Statement sentencia4;
        System.out.println(" ");
        System.out.println("Ingrese su correo: ");
       
        String correo= (teclado.next());
        System.out.println(" ");
        System.out.println("Ingrese su contraseña: ");
        String contraseña= (teclado.next());
        System.out.println(" ");
         boolean usuarioRegistrado=false;
        try{
          sentencia =conexion.getConexionBD().createStatement();
          sentencia2=conexion.getConexionBD().createStatement();
          sentencia3=conexion.getConexionBD().createStatement();
          sentencia4=conexion.getConexionBD().createStatement();
          ResultSet resultado = sentencia.executeQuery("select contraseña from proveedor ");
          ResultSet resultado2= sentencia2.executeQuery("select correo from proveedor ");
          ResultSet resultado3 = sentencia3.executeQuery("select nombre from proveedor ");
          ResultSet resultado4 = sentencia4.executeQuery("select id_proveedor from proveedor ");
         
          
          ResultSetMetaData campos = resultado.getMetaData();
          int Cantidadcolumnas =campos.getColumnCount();
      
          
       
            System.out.println(" ");
            while(resultado.next()&&resultado2.next()&&resultado3.next()){
                for (int i=0; i<Cantidadcolumnas;i++){
                   if(contraseña.equals(resultado.getObject(i+1))&& correo.equals(resultado2.getObject(i+1))){
                           System.out.println("                       Bienvenido   " + resultado3.getObject(i+1) );
                           id_proveedor = i+1; 
                           Vista.Menu_Proveedor();
                   }
                   else if(!contraseña.equals(resultado.getObject(i+1))&& correo.equals(resultado2.getObject(i+1))){
                       usuarioRegistrado=true; 
                   }
                  
                
                }
                System.out.println(" ");
            }
            
            if(usuarioRegistrado){
                System.out.println(" ");
                System.out.println("Contraseña incorrecta desea recuperarla? (si/no) ");
                System.out.println(" ");

                String opcion=teclado.next();
                if(opcion.equals("si") ){
                    administrador.recuperar_Contraseña();
                }
                else{
                    administrador.IniciarSesion();
                    System.out.println(" ");
                }
                
            }
            else{
                System.out.println(" ");
                System.out.println("Usuario no registrado desea registrarse?(si/no) ");
                System.out.println(" ");
                  String opcion=teclado.next();
                if(opcion.equals("si") ){
                    Usuario.registro();
                }
                else{
                    System.out.println(" ");
                    Proveedor.IniciarSesion();
                }
            }
           
            
        }catch (SQLException e){
            System.out.println(" "+ "error SQl "+ e);
        }catch(Exception e){
            System.out.println(" "+"error " + e);
        }
        
  }
        public static void cambiar_datos_personales(){
         Statement sentencia;
            System.out.println("Cambiar nombre");
           System.out.println("Cambiar correo");
           System.out.println("Cambiar contraseña");
           String opcion= teclado.next();
            System.out.println(" ");
            System.out.println(" por favor digite su nuevo "+ opcion);
            String nuevoDato= teclado.next();
           try{
                   String instruccion="update proveedor set "+opcion+"=? where id_proveedor ="+ id_proveedor+"";
                   conexion.sentencia= conexion.getConexionBD().prepareStatement(instruccion);
                   conexion.sentencia.setString(1,nuevoDato);
                   conexion.sentencia.execute();
                       System.out.println("su " +opcion+ " se cambio correctamente ");
                    Proveedor.IniciarSesion();
                   }catch(Exception e){
                       System.out.println("erro "+ e);
                   }
           
        }
        public static void recuperar_Contraseña(){
     boolean usuarioRegistrado=false;
     String usuario=" ";
       Statement sentencia;
      
     System.out.println(" ");
     System.out.println(" ");
     System.out.println("Digite su correo regsitrado");
     String correo= teclado.next();
     try{
          sentencia =conexion.getConexionBD().createStatement();
    
          ResultSet resultado= sentencia.executeQuery("select correo from proveedor ");
          ResultSetMetaData campos = resultado.getMetaData();
          int Cantidadcolumnas =campos.getColumnCount();
      
          
       
            System.out.println(" ");
            while(resultado.next()){
                for (int i=0; i<Cantidadcolumnas;i++){
                   if(correo.equals(resultado.getObject(i+1))){
                         usuarioRegistrado=true; 
                         usuario = (String) resultado.getObject(i+1);
                        

                   }   
                }
                System.out.println(" ");
            }
            
            if(usuarioRegistrado==true){
                System.out.println("Digite la contraseña nueva");
                String nuevaCont=teclado.next();
                System.out.println("confirme su nueva contraseña");
                String confiCont=teclado.next();
                if(nuevaCont.equals(confiCont)){
                   try{
                   String instruccion="update proveedor set contraseña=? where correo='"+ usuario +"'";
                   conexion.sentencia= conexion.getConexionBD().prepareStatement(instruccion);
                   conexion.sentencia.setString(1,nuevaCont);
                   conexion.sentencia.execute();
                       System.out.println("su contraseña se cambio correctamente ");
                    Proveedor.IniciarSesion();
                   }catch(Exception e){
                       System.out.println("erro "+ e);
                   }
                }
                
            }
            else{
                System.out.println("  ");
                System.out.println("correo incorrecto, por favor vuelva a ingresarlo");
                System.out.println("  ");
                Proveedor.recuperar_Contraseña();
            }
           
            
        }catch (SQLException e){
            System.out.println(" "+ "error SQl "+ e);
        }catch(Exception e){
            System.out.println(" "+"error " + e);
        }
     
     
 } 
    
}
