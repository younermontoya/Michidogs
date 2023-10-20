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

/**
 *
 * @author usuario 1
 */
public class Cliente {
    public int cedula;
    public int edad;
   

   

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
  
}

