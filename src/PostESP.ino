#include <SoftwareSerial.h>
#include <ESP8266HTTPClient.h>
#include <ESP8266WiFi.h>

SoftwareSerial serialESP(3, 2);
const char *ssid = "Rincon Violeta 3F";
const char *password = "rinconvioleta2392";

WiFiClient client; // Crea un objeto de la clase WiFiClient que se utilizará para conectar con la red WiFi.

void setup() {
  Serial.begin(9600);
  serialESP.begin(9600);
  WiFi.begin(ssid, password);
  Serial.print("Conectando...");

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("Conexión WiFi OK!");
  Serial.print("IP Local: ");
  Serial.println(WiFi.localIP());
}

void loop() {
  Serial.println("Comprobación de disponibilidad...");

  if (serialESP.available()) {
    String dato_str = serialESP.readStringUntil('\n'); // Lee toda la cadena hasta un salto de línea
    // Dividir la cadena en partes (valor,nombre)
    int comaIndex = dato_str.indexOf(',');
    if (comaIndex >= 0) {
      String valor_str = dato_str.substring(0, comaIndex);
      String nombre_str = dato_str.substring(comaIndex + 1);

      float dato = valor_str.toFloat();
      float nombre = nombre_str.toFloat();
      Serial.print("Datos disponibles: " + String(dato) + ", " + String(nombre));
      
      // Envía el dato y el nombre por POST al servidor web
      if (enviarDatosPorPOST(dato, nombre)) {
        Serial.println("Datos enviados con éxito.");
        Serial.println("");
      } else {
        Serial.println("Error al enviar los datos.");
      }
    } else {
      Serial.println("Error al analizar los datos.");
    }
  } else {
    Serial.println("Esperando datos...");
  }
}

bool enviarDatosPorPOST(float dato, float nombre) {
  if (WiFi.status() == WL_CONNECTED) {
    HTTPClient http;
    String datos_a_enviar = "dato=" + String(dato) + "&nombre=" + String(nombre);

    http.begin(client, "http://esp8266alfa.000webhostapp.com/EspPost.php");
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");

    int codigo_respuesta = http.POST(datos_a_enviar);

    if (codigo_respuesta > 0) {
      Serial.println("Código HTTP: " + String(codigo_respuesta));

      if (codigo_respuesta == 200) {
        String cuerpo_respuesta = http.getString();
        Serial.println("El servidor respondió:");
        Serial.println(cuerpo_respuesta);
      }

      http.end();
      return true;
    } else {
      Serial.print("Error enviado POST, código: ");
      Serial.println(codigo_respuesta);
      http.end();
      return false;
    }
  } else {
    Serial.println("Error en la conexión WiFi");
    return false;
  }
}
