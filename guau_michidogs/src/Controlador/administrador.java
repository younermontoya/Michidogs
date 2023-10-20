/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Controlador;


import java.sql.ResultSet;
import java.sql.ResultSetMetaData;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.Scanner;
import modelo.conexion;
import vista.Vista;

public class administrador {
   public static  String nombre,apellido,contraseña,telefono,correo;
   public static Scanner teclado= new Scanner (System.in);
    public static conexion conexion=new conexion();
   public static String getNombre() {
        return nombre;
    }

    public static void setNombre(String nombre) {
        administrador.nombre = nombre;
    }

    public static String getApellido() {
        return apellido;
    }

    public static void setApellido(String apellido) {
        administrador.apellido = apellido;
    }

    public static String getContraseña() {
        return contraseña;
    }

    public static void setContraseña(String contraseña) {
        administrador.contraseña = contraseña;
    }

    public static String getTelefono() {
        return telefono;
    }

    public static void setTelefono(String telefono) {
        administrador.telefono = telefono;
    }

    public static String getCorreo() {
        return correo;
    }

    public static void setCorreo(String correo) {
        administrador.correo = correo;
    }
    
    
   
    
  public static void Registro_Admin(){
       administrador administrador1= new administrador();
 
       System.out.println(" ");
       System.out.println("Por favor ingrese su nombre");
       administrador1.setNombre(teclado.next());
       System.out.println("Digite su correo");
       administrador1.setCorreo(teclado.next());
       System.out.println("Digite su apellido");
       administrador.setApellido(teclado.next());
       System.out.println("digite su contraseña");
       administrador1.setContraseña(teclado.next());
       System.out.println("Digite su numero telefonico");
       administrador1.setTelefono(teclado.next());
       
       try{
           
       String instruccion = "insert into administrador (nombre,apellido,contraseña,telefono,correo)" +"values (?,?,?,?,?)";
       conexion.sentencia= conexion.getConexionBD().prepareStatement(instruccion);
       conexion.sentencia.setString(1, administrador1.getNombre());
       conexion.sentencia.setString(2, administrador1.getApellido());
       conexion.sentencia.setString(3, administrador1.getContraseña());
       conexion.sentencia.setString(4, administrador1.getTelefono());
       conexion.sentencia.setString(5, administrador1.getCorreo());
       conexion.sentencia.execute();
       System.out.println(" ");
       System.out.println("Administrador registrado");
 
       }catch(Exception e){
           System.out.println("error "+e);
       }}  
  
  
  
  
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
          ResultSet resultado = sentencia.executeQuery("select contraseña from administrador ");
          ResultSet resultado2= sentencia2.executeQuery("select correo from administrador ");
          ResultSet resultado3 = sentencia3.executeQuery("select nombre from administrador ");
          ResultSetMetaData campos = resultado.getMetaData();
          int Cantidadcolumnas =campos.getColumnCount();
      
          
       
            System.out.println(" ");
            while(resultado.next()&&resultado2.next()&&resultado3.next()){
                for (int i=0; i<Cantidadcolumnas;i++){
                   if(contraseña.equals(resultado.getObject(i+1))&& correo.equals(resultado2.getObject(i+1))){
                           System.out.println("                       Bienvenido  administador " + resultado3.getObject(i+1) );
                           Vista.Menu_Administrador();
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
                System.out.println("Administrador no admitido");
                System.out.println(" ");
                Vista.Menu_Principal();
            }
           
            
        }catch (SQLException e){
            System.out.println(" "+ "error SQl "+ e);
        }catch(Exception e){
            System.out.println(" "+"error " + e);
        }
  }
  
  
  
  public static void consultarBaseDatos(){
      System.out.println(" ");
      System.out.println("1-consultar conjunto de datos por parametro string ");
      System.out.println("2-Consultar por clave primaria o por parámetro  numerico ");
      System.out.println("3-Consultar tablas conpletas ");
      System.out.println(" ");
      int opcion=teclado.nextInt();
      if(opcion==1){
                 Statement sentencia;
                 System.out.println(" ");
                 System.out.println("Digite la tabla ");
                 String tabla = teclado.next();
                 System.out.println("Digite el parámetro ");
                 String parametro =teclado.next();
                 System.out.println(" Digite el valor del parámetro");
                 String contraseña1= teclado.next();
                 System.out.println(" ");
                    try{
                     sentencia =conexion.getConexionBD().createStatement();
                     ResultSet resultado = sentencia.executeQuery("select * from "+ tabla+" where "+parametro+"'"+contraseña1+"'");
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
                        System.out.println("  ");
                        System.out.println("   ");
                   }catch (SQLException e){
                       System.out.println(" "+ "error SQl "+ e);
                   }catch(Exception e){
                       System.out.println(" "+"error " + e);
                   }
      }
      else if(opcion==2){
                    Statement sentencia;
                    System.out.println(" ");
                    System.out.println("Digite la tabla ");
                    String tabla = teclado.next();
                    System.out.println("Digite el nombre de la clave primaria o parámetro numérico");
                    String parametro =teclado.next();
                    System.out.println(" Digite el valor de la clave primaria parámetro numérico ");
                    String contraseña1= teclado.next();
                    System.out.println(" ");
                       try{
                        sentencia =conexion.getConexionBD().createStatement();
                        ResultSet resultado = sentencia.executeQuery("select * from "+ tabla+" where "+parametro+""+contraseña1+"");
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
                           System.out.println("  ");
                           System.out.println("   ");
                      }catch (SQLException e){
                          System.out.println(" "+ "error SQl "+ e);
                      }catch(Exception e){
                          System.out.println(" "+"error " + e);
                      }
      }
      
      else if(opcion==3){
                        Statement sentencia;
                        System.out.println(" ");
                        System.out.println("Digite la tabla ");
                        String tabla = teclado.next();
                        
                        System.out.println(" ");
                           try{
                            sentencia =conexion.getConexionBD().createStatement();
                            ResultSet resultado = sentencia.executeQuery("select * from "+ tabla+" ");
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
                               System.out.println("  ");
                               System.out.println("   ");
                          }catch (SQLException e){
                              System.out.println(" "+ "error SQl "+ e);
                          }catch(Exception e){
                              System.out.println(" "+"error " + e);
                          }
      }
      else{
          System.out.println(" ");
          System.out.println("Ingrese una opción válida");
          System.out.println(" ");
          administrador.consultarBaseDatos();
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
    
          ResultSet resultado= sentencia.executeQuery("select correo from administrador ");
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
                   String instruccion="update administrador set contraseña=? where correo='"+ usuario +"'";
                   conexion.sentencia= conexion.getConexionBD().prepareStatement(instruccion);
                   conexion.sentencia.setString(1,nuevaCont);
                   conexion.sentencia.execute();
                       System.out.println("su contraseña se cambio correctamente ");
                    administrador.IniciarSesion();
                   }catch(Exception e){
                       System.out.println("erro "+ e);
                   }
                }
                
            }
            else{
                System.out.println("  ");
                System.out.println("correo incorrecto, por favor vuelva a ingresarlo");
                System.out.println("  ");
                administrador.recuperar_Contraseña();
            }
           
            
        }catch (SQLException e){
            System.out.println(" "+ "error SQl "+ e);
        }catch(Exception e){
            System.out.println(" "+"error " + e);
        }
     
     
 } 
  

}
