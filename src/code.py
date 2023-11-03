import board
import busio
import adafruit_ads1x15.ads1115 as ADS
from adafruit_ads1x15.analog_in import AnalogIn
import time

# Configura la comunicación serie a 9600 baudios
uart = busio.UART(board.TX, board.RX, baudrate=9600)

# Configura el ADC (Ads1115)
i2c = busio.I2C(board.SCL, board.SDA)
ads = ADS.ADS1115(i2c)
chan = AnalogIn(ads, ADS.P0)
chan1 = AnalogIn(ads, ADS.P1)
chan2 = AnalogIn(ads, ADS.P2)
chan3 = AnalogIn(ads, ADS.P3)

while True:
    valor_adc = chan.value
    valor_adc1 = chan1.value
    valor_adc2 = chan2.value
    valor_adc3 = chan3.value

    voltaje = (valor_adc / 32767.0) * 4.096
    voltaje1 = (valor_adc1 / 32767.0) * 4.096
    voltaje2 = (valor_adc2 / 32767.0) * 4.096
    voltaje3 = (valor_adc3 / 32767.0) * 4.096

    name = "0"
    name1 = "1"
    name2 = "2"
    name3 = "3"

    data = f"{voltaje},{name}\n"
    uart.write(bytes(data, 'utf-8'))
    time.sleep(1)
    print("Datos enviados: " + data)

    data = f"{voltaje1},{name1}\n"
    uart.write(bytes(data, 'utf-8'))
    time.sleep(1)
    print("Datos enviados: " + data)

    data = f"{voltaje2},{name2}\n"
    uart.write(bytes(data, 'utf-8'))
    time.sleep(1)
    print("Datos enviados: " + data)

    data = f"{voltaje3},{name3}\n"
    uart.write(bytes(data, 'utf-8'))
    time.sleep(1)
    print("Datos enviados: " + data)
