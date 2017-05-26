<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
</head>
<body style="font-size: 10pt;   font-family: 'Arial, Helvetica, Verdana, Tahoma, sans-serif'">
<div id="header" style="border-bottom: 1px solid #000000; font-size: 10pt; text-align: center; padding-bottom: 35mm; ">
    <table>
        <tr width="100%" >
           
            <td width="80%">
                <h4>Dirección de Informática &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
                    Integración de Sistemas<br>
                    Carta de Responsabilidad<br>
                    {{env('NAME_URL')}}<br>
                </h4>

            </td>
            <td>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              

               <?php 
                $image_path = '/images/mingob_bar_min.png'; 
                ?> 
               <img src="{{ public_path() . $image_path }}" width="20%">


            
            </td>
            
        </tr>
    </table>
    <br>
  
      
    <h2>{{$user->nombre_usuario}} {{$user->apellido_usuario}}</h2>

</div>


<br>

<!--footer para cada pagina-->
<div id="footer">
    <!--aqui se muestra el numero de la pagina en numeros romanos-->
    <p style="border-top: 1px solid #000000; font-size:10pt; text-align: center; padding-top: 3mm; " >
  
    </p>

<br>
    <table >
        <tr>
            <td width="100" align="left" valign="top" >
                <stron>Usuario:</stron> {{ $user_genera }}
            </td>
            <td width="300" align="center" valign="top" >
                Ministerio de Gobernación 6ª. Avenida<br>
13-71 Zona 1, 3er. Nivel PBX 2413-8888<br>
Ext. -3201
            </td>
            <td width="100" align="right" valign="top" >
                {{ $fecha }}<br>
                P&aacute;gina <small class="page"></small>
            </td>
        </tr>
    </table>
</div>


<div style="padding-top: -5%;">
 
  <br><br><br><br><br>
  <strong>Sistema: </strong><span>{{ env('NAME_APP')}}</span><br>
  <strong>Ubicación: </strong><span>{{ $ubicacion }}</span><br>
  <strong>ID: </strong><span>{{$user->id_usuario}}</span><br>
  <strong>Usuario: </strong><span>{{$user->usuario}}</span><br>

  <strong>Documento de identificación: </strong><span>{{$user->documento_identificacion}}</span><br>
  <strong>Correo Electrónico: </strong><span>{{ $correo }}</span><br>
  

  <strong>

  @if(count($roles)>1)
        Roles:
  @else
        Rol:                                           
  @endif 

  </strong>
    
  <span>
  @foreach ($roles as $rol)
    {{ $rol["rol"] }},
  @endforeach
       
    


  </span><br>
  

  <strong>Fecha Creación: </strong><span>{{ $fecha_creacio_usr }}</span><br><br><br><br>


  <strong>Estimado Usuario: </strong><br>



  <p align="justify">Se hace de su conocimiento que el usuario y contraseña se entrega de forma personal y
posteriormente será habilitado, al recibir este acceso, usted se hace directamente responsable del
uso que se le pueda dar a la misma, en cuanto a tener confidencialidad, no compartirla, ni prestarla
a otro usuario, por urgente que esta sea. La cuenta es de uso personal e intransferible. Al ingresar al
sistema se solicita ingrese en la primera pantalla el usuario y contraseña (estándar) que se le ha
entregado en este documento, posteriormente en una segunda pantalla se solicita, cambie su
contraseña por la que usted crea conveniente preferentemente debe estar compuesta por letras y
números (mínimo 6 dígitos) por Políticas de Seguridad en los Sistemas de Información, establecidas
en la Dirección de Informática de este Ministerio y Código Penal, Capítulo VII, artículo 274. USO Y
ACCESO DE LA INFORMACION. El incumplimiento de estas disposiciones dará lugar a iniciar
procedimiento administrativo correspondiente.</p> <br>

<strong>Observaciones: </strong><br>

<p align="justify">Al recibir la presente sírvase brindar los siguientes datos: copia documento de identificación ( DPI) y
firma, para ingresarlos en la bitácora de accesos, y brindarle soporte o capacitación. Cualquier
información adicional sírvase comunicarse a nuestro servicio HELP DESK en la Dirección de
Informática, del Ministerio de Gobernación a los números de extensión descritos al pie de la
presente, donde gustosamente se le atenderá.</p> <br>



</div>




<style>
    .well_pdf {
        min-height: 5px;
        padding: 10px;
        margin-bottom: 10px;
        background-color: #fff;
        border: 1px solid #5e5e5e;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
        -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
    }
    /* estilos para el footer y el numero de pagina */
    @page { margin: 180px 50px; }
    #header {
        position: fixed;
        left: 0px;
        top: -120px;
        right: 0px;
        height: 30px;
        /*background-color: #333;*/
        color: #000000;
        text-align: left;
    }
    #footer {
        position: fixed;
        left: 0px;
        bottom: -70px;
        right: 0px;
        height: 0px;
        /* background-color: #333;*/
        color: #000000;
    }
    #footer .page:after {
        content: counter(page);
    }
</style>
</body>
</html>