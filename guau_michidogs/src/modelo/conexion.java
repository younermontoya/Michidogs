/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package modelo;
import java.sql.DriverManager;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.SQLException;



public class conexion {
    public Connection conexionBD;
    public PreparedStatement sentencia;
    
    public conexion(){
        String ruta="jdbc:mysql://localhost:3306/michidogs";
        try{
            Class.forName("com.mysql.cj.jdbc.Driver");
            conexionBD=DriverManager.getConnection(ruta, "root", "");
        }
        catch(ClassNotFoundException e){
            System.out.println("Error"+ e);
        }
        catch(SQLException e){
            System.out.println("error en la conexion: "+ e);
        }
    }

    public Connection getConexionBD() {
        return conexionBD;
    }

    public void setConexionBD(Connection conexionBD) {
        this.conexionBD = conexionBD;
    }
    
    
}
