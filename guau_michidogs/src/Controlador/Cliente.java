/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Controlador;

import static Controlador.Usuario.conexion;
import java.sql.ResultSet;
import java.sql.ResultSetMetaData;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.Scanner;
import vista.Vista;
import java.util.Scanner;
/**
 *
 * @author usuario 1
 */
public class Cliente {
    public int cedula;
    public int edad;
    public static Scanner teclado=new Scanner(System.in);

   

    public int getCedula() {
        return cedula;
    }

    public void setCedula(int cedula) {
        this.cedula = cedula;
    }

    public int getEdad() {
        return edad;
    }

    public void setEdad(int edad) {
        this.edad = edad;
    }
    
 public static void MostrarCliente_Comprador() {
        Statement sentencia;
        
        try{
          sentencia =conexion.getConexionBD().createStatement();
          ResultSet resultado = sentencia.executeQuery("select * from cliente_comprador");
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
            conexion.getConexionBD().close();
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
          ResultSet resultado = sentencia.executeQuery("select contraseña from cliente_comprador ");
          ResultSet resultado2= sentencia2.executeQuery("select correo from cliente_comprador ");
          ResultSet resultado3 = sentencia3.executeQuery("select nombre from cliente_comprador ");
          ResultSetMetaData campos = resultado.getMetaData();
          int Cantidadcolumnas =campos.getColumnCount();
      
          
       
            System.out.println(" ");
            while(resultado.next()&&resultado2.next()&&resultado3.next()){
                for (int i=0; i<Cantidadcolumnas;i++){
                   if(contraseña.equals(resultado.getObject(i+1))&& correo.equals(resultado2.getObject(i+1))){
                           System.out.println("                       Bienvenido   " + resultado3.getObject(i+1) );
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
  
}

