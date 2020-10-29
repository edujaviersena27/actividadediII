<?php
$comprobantes = fopen('comprobantes.dat', 'r+') or die("Error de apertura de archivo, consulte con el administrador...");
$personas = fopen('personas.dat', 'r+') or die("Error de apertura de archivo, consulte con el administrador...");
$modelos = fopen('modelos.dat', 'r+') or die("Error de apertura de archivo, consulte con el administrador...");
$vehiculos = fopen('vehiculos.dat', 'r+') or die("Error de apertura de archivo, consulte con el administrador...");
$marcas = fopen('marcas.dat', 'r+') or die("Error de apertura de archivo, consulte con el administrador...");
$archivo3 = fopen('prueba.dat', 'r+') or die("Error de apertura de archivo, consulte con el administrador...");
$archivo2 = fopen('bweb3.dat', 'r+') or die("Error de apertura de archivo, consulte con el administrador...");
$archivo = fopen('bweb2.dat', 'r+') or die("Error de apertura de archivo, consulte con el administrador...");
    while (!feof($archivo)) {
      $linea = fgets($archivo);
      $datos = explode("*", $linea);
       $nro_recibo= substr($datos[0],0 ,12);
       $periodo=substr($datos[0],12 ,4);
       $cuota_periodo=substr($datos[0],16 ,2);
       $dominio=substr($datos[0],18 ,6);
       $marca=substr($datos[0],24,21);
       $modelo=substr($datos[0],45,15);
       $chasis=substr($datos[0],60,4);
       $vencimiento1=substr($datos[0],64,8);
       $importe_cuota=substr($datos[0],72,8);
       $importe_cuota_decimales=substr($datos[0],80,2);
       $vencimiento2=substr($datos[0],82,8);
       $importe_venc2=substr($datos[0],90,8);
       $importe_venc2_decimales=substr($datos[0],98,2);
       $destinatario=substr($datos[0],100,30);
       $domicilio_calle=substr($datos[0],130,20);
       $altura=substr($datos[0],150,6);
       $codigo_postal=substr($datos[0],156,4);
       $localidad=substr($datos[0],160,20);
       $codigo_barras=substr($datos[0],180,50);
      fputs($archivo3, $nro_recibo . "|". $periodo . "|". $cuota_periodo ."|". $dominio ."|". trim($marca) ."|". trim($modelo) ."|". $chasis ."|". $vencimiento1 ."|". $importe_cuota .",". $importe_cuota_decimales ."|". $vencimiento2 ."|". $importe_venc2 .",". $importe_venc2_decimales ."|". trim($destinatario) ."|". trim($domicilio_calle) ."|". $altura ."|". $codigo_postal ."|". trim($localidad) ."|". $codigo_barras ."\n");
      fputs($marcas, trim($marca) ."\n");
      fputs($modelos, trim($marca) ."|". trim($modelo) ."\n");
      fputs($vehiculos, trim($marca) ."|". trim($modelo) ."|". $chasis . "|" . $nro_recibo ."|". trim($destinatario) ."|". trim($domicilio_calle) ."|". $altura ."|". $codigo_postal ."\n");
      fputs($personas, trim($destinatario) ."|". trim($domicilio_calle) ."|". $altura ."|". $codigo_postal ."|". trim($localidad) ."\n");
      fputs($comprobantes, $nro_recibo . "|". $periodo . "|". $cuota_periodo ."|". $dominio ."|". trim($marca) ."|". trim($modelo) ."|". $chasis ."|". $vencimiento1 ."|". $importe_cuota .",". $importe_cuota_decimales ."|". $vencimiento2 ."|". $importe_venc2 .",". $importe_venc2_decimales ."\n");
    }
    fclose($archivo);
