ususarios = {
    "tipo_usuario": [],
    "nombre" : [],
    "apellido": [],
    "telefono": [],
    "correo": [],
    "contraseña": []
}
def crearUsuario():
    tipo_usuario = input("Ingrese tipo de usuario: ")
    nombre = input("Ingrese el nombre: ")
    apellido = input("ingrese apellido: ")
    telefono = input("Ingrese telefono: ")
    correo = input("Ingrese correo: ")
    contraseña = input("Ingrese contraseña: ")

    ususarios["tipo_usuario"].append(tipo_usuario)
    ususarios["nombre"].append(nombre)
    ususarios["apellido"].append(apellido)
    ususarios["telefono"].append(telefono)
    ususarios["correo"].append(correo)
    ususarios["contraseña"].append(contraseña)


   

def ingresarSistema():
    correo = input("Ingrese el correo: ")
    contraseña = input("Ingrese contraseña: ")
    if correo == ususarios["correo"] and contraseña == ususarios["contraseña"]:
        print("Acceso exitoso")
    else:
        print("Contraseña o correo incorrecto")
        opc = input("¿Desea recuperar contraseña? ")
        if opc == "si":
            RecuperarContrasena()
        else:
            print("Volver a ingresar")


def RecuperarContrasena():
    n=2
    correo=input("Por favor digite el correo: ")

    print("Continuar")
    print("1.si")
    print("2.no")
    continuar=int(input(""))
   
    if continuar==1 and correo==ususarios["correo"]:
         print("Enviar Codigo de verficación")
         print(" ")
         while n>0:
             newContrasena=input("Digite nueva contraseña: ")
             conContrasena=input("Confirmar Contraseña: ")
             if (newContrasena==conContrasena):
                ususarios["contraseña"]=newContrasena
                print("Su contraseña se cambió correctamente")
                n=0
             else:
                print("La confirmación de la contraseña no corresponde")
                print("Vuelva a digitar nueva contraseña")
    
    else:
       print("Correo no registrado")

def  cambiarDatos():
    n=2
    n2=2
    print("configurar Cuenta")
    
    while n>0:
         print("1. Nombre")
         print("2. Apellido")
         print("3. Tipo de usuario")
         print("4. Telefono")
         print("5. correo")
         print("6. contraseña")
         opcion=int(input("Elija el dato que desea cambiar"))
         if opcion==1:
             new_Nombre=input("ingrese Nuevo_Nombre")
             ususarios["nombre"]=new_Nombre
         elif opcion==2:
             new_Apellido=input("ingrse Nuevo_Apellido")
             ususarios["apellido"]=new_Apellido
         elif opcion==3:
             new_Tipo=input("Ingrese el tipo de usuario")
             ususarios["tipo_usuario"]=new_Tipo
         elif opcion==4:
             new_Telef=input("digite el nuevo Numero teléfonico")
             ususarios["telefono"]=new_Telef
         elif opcion==5:
             new_Correo=input("Por favor ingrese el nuevo correo eléctronico")
             ususarios["correo"]=new_Correo
         elif opcion==6:
             RecuperarContrasena()
         else:
             print("Opcion Invalida")
         while n2>0:
            print("Desea cambiar otro dato ")
            print("si")
            print("no")
            opcion2=input("")
            if opcion2=="si":
                n2=0
            else:
                n2=0
                n=0
def mostrar_Usuarios():
    print(ususarios)
    
n=1
while n>0:
    print("------Bienvenidos a MichisandDogs-------")
    print("1. Crear Usuario") 
    print("2. Ingresar al sistema")
    print("3. Recuperar Contraseña")
    print("4. Opción de cuenta")
    print("5. Mostrar usuarios")
    opc = int(input("Seleccione una opcion"))
    if opc == 1:
        crearUsuario()
    elif opc ==2:
        ingresarSistema()
    elif opc==3:
        RecuperarContrasena()
    elif opc==4:
        cambiarDatos()
    elif opc==5:
        mostrar_Usuarios()
    #Nuevo comentario 
    #cambios 2


    #hola
    #esto es una prueba panas mios