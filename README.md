# ESP8266-QTPy-ADS1115-Data-Logger

<p style="text-align: justify;">
Este repositorio alberga un sistema de registro de datos que utiliza una combinación de placas electrónicas, incluyendo la ESP8266, QTPy SAMD21 y ADS1115. El proyecto captura datos de los canales del convertidor analógico a digital (ADS1115), los transmite a través de UART desde la QTPy SAMD21 a la ESP8266 y finalmente envía los datos a una base de datos alojada en un servidor web (000webhost). Este sistema es ideal para la monitorización y registro de sensores y dispositivos en tiempo real.
</p>

- [Sitio web del proyecto](http://esp8266alfa.000webhostapp.com/)

### Tabla de contenidos

- [Instalación](#instalación)
- [Uso](#Uso)
- [Licencia](#licencia)
- [Autor](#Autor)
- [Contribuciones](#Contribuciones)
- [Contacto](#contacto)

## Instalación

REQUIERE las siguientes bibliotecas de Arduino:
- ESPSoftwareSerial
- WiFi

REQUIERE Instalar Plugin del ESP8266 para Arduino.
- ir a archivo>Preferencias y en la casilla  “Gestor de URLs Adicionales de Tarjetas”
- agregamos: http://arduino.esp8266.com/stable/package_esp8266com_index.json

REQUIERE Instalar controladores del puerto COM virtual (VCP) del puente USB a UART CP210x
necesarios para el funcionamiento del dispositivo como un puerto COM virtual
se puede bajar de: 
- https://www.silabs.com/developers/usb-to-uart-bridge-vcp-drivers?tab=downloads

o con el enlace directo:

- https://github.com/nodemcu/nodemcu-devkit/raw/master/Drivers/CH341SER_WINDOWS.zip

## Uso
1. Conectar la placa ESP8266 y la placa QTPy SAMD21 al computador.
   
2. Abrir y cargar el codigo del archivo *PostESP*, desde ArduinoIDE a la placa ESP8266.

3. Abrir y cargar el *codigo* del archivo *code*, desde Mu Editor a la placa QTPy SAMD21. 

4. Abrir desde cualquier navegador con internet el sitio web: http://esp8266alfa.000webhostapp.com/ y verificar la lectura de datos.


## Licencia
Este proyecto está bajo la [Licencia MIT](https://opensource.org/licenses/MIT). Consulta el [texto completo de la Licencia MIT](https://opensource.org/licenses/MIT) en el sitio web de OSI para obtener más detalles.


## Contribuciones
Las contribuciones son bienvenidas. Si deseas mejorar este proyecto, crea un fork del repositorio, realiza tus cambios y envía una solicitud de extracción.
## Contacto

| Meteoróloga: María Víquez Bolaños     | Ingeniero: Alex Alberto Varela Quirós     |
|-------------------------------------|-----------------------------------------|
| Correo: marvibo29@gmail.com         | Correo: alex.varela@ucr.ac.cr            |
| ![Imagen de María](https://i.postimg.cc/4dnD57G3/Mari.png) | [![Icono Pequeño](https://i.postimg.cc/hvtdRL0p/iconopeque.jpg)](https://postimg.cc/k6L4xtzb)               |
