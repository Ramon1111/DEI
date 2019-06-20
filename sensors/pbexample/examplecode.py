#coding=utf-8
from pubnub.pnconfiguration import PNConfiguration
from pubnub.pubnub import PubNub
from pubnub.callbacks import SubscribeCallback

import RPi.GPIO as GPIO
import time

import dht11

GPIO.setmode(GPIO.BOARD)
GPIO.setup(7,GPIO.OUT) #puerta Principal
GPIO.setup(8,GPIO.IN) #Detector de humo
GPIO.setup(12,GPIO.IN) #PIR
GPIO.setup(13,GPIO.OUT) #Puerta del garage

#Pines para los focos
GPIO.setup(15, GPIO.OUT, initial=GPIO.LOW) #Sala,comedor, Cocina (AMARILLO)
GPIO.setup(16, GPIO.OUT, initial=GPIO.LOW) #Recamara 1, pasillo, baño (ROJO)
GPIO.setup(18, GPIO.OUT, initial=GPIO.LOW) #Pórtico y pasillo principal (NARANJA)
GPIO.setup(19, GPIO.OUT, initial=GPIO.LOW) #Cochera (AZUL)
GPIO.setup(21, GPIO.OUT, initial=GPIO.LOW) #Recamara 2 y 3, baño (VERDE)

GPIO.setup(22, GPIO.OUT, initial=GPIO.LOW) #Iluminación exterior (IZQUIERDA-Arriba)
GPIO.setup(23, GPIO.OUT, initial=GPIO.LOW) #Iluminación exterior (IZQUIERDA-Abajo)
GPIO.setup(32, GPIO.OUT, initial=GPIO.LOW) #Iluminación exterior (DERECHA-Arriba)
GPIO.setup(33, GPIO.OUT, initial=GPIO.LOW) #Iluminación exterior (DERECHA-Abajo)
GPIO.setup(35, GPIO.OUT, initial=GPIO.LOW) #Iluminación exterior (DERECHA-Abajo)
GPIO.setup(36, GPIO.OUT, initial=GPIO.LOW) #Iluminación exterior (DERECHA-Abajo)
GPIO.setup(37, GPIO.OUT, initial=GPIO.LOW) #Iluminación exterior (DERECHA-Abajo)
GPIO.setup(38, GPIO.OUT, initial=GPIO.LOW) #Iluminación exterior (DERECHA-Abajo)

GPIO.setup(40, GPIO.OUT, initial=GPIO.LOW) #Ventilador

led1=0
led2=0
led3=0
led4=0
led5=0
led6=0

ext=0

gas=0
pir=0

p = GPIO.PWM(7,50)
q = GPIO.PWM(13,50)
q.start(7.5) #Puerta del garage
p.start(7.5) #Puerta principal
GPIO.setup(7,GPIO.IN)
GPIO.setup(13,GPIO.IN)
instance = dht11.DHT11(pin=11) #Sensor de Temperatura

pnconfig = PNConfiguration()

pnconfig.subscribe_key = 'sub-c-1c31c1b8-8bcb-11e9-9769-e24cdeae5ee1'
pnconfig.publish_key = 'pub-c-4872297c-41b7-4f68-ad26-ed2061493795'

pubnub = PubNub(pnconfig)

channel = 'pubnub_onboarding_channel'

#Variables del estado de las puertas
puertaGarage=0
puertaPrincipal=0

class Listener(SubscribeCallback):
    def message(self, pubnub, message):
        print(message.message)
        global puertaPrincipal
        global puertaGarage
        global led1
        global led2
        global led3
        global led4
        global led5
        global led6
        global ext
        global gas
        global pir

        if message.message == 'abrir1':
            GPIO.setup(7,GPIO.OUT)
            print('Abrir puerta')
            try:
                p.ChangeDutyCycle(12.5)
                time.sleep(.5)
                GPIO.setup(7,GPIO.IN)
                puertaPrincipal=1
            except KeyboardInterrupt:
                p.stop()
                GPIO.cleanup()
        elif message.message == 'cerrar1':
            GPIO.setup(7,GPIO.OUT)
            print('Cerrar Puerta')
            try:
                p.ChangeDutyCycle(7.5)
                time.sleep(.5)
                GPIO.setup(7,GPIO.IN)
                puertaPrincipal=0
            except KeyboardInterrupt:
                p.stop()
                GPIO.cleanup()
        elif message.message == 'abrir2':
            GPIO.setup(13,GPIO.OUT)
            print('Abrir puerta')
            try:
                q.ChangeDutyCycle(12.5)
                time.sleep(.5)
                GPIO.setup(13,GPIO.IN)
                puertaGarage=1
            except KeyboardInterrupt:
                q.stop()
                GPIO.cleanup()
        elif message.message == 'cerrar2':
            GPIO.setup(13,GPIO.OUT)
            print('Cerrar Puerta')
            try:
                q.ChangeDutyCycle(7.5)
                time.sleep(.5)
                GPIO.setup(13,GPIO.IN)
                puertaGarage=0
            except KeyboardInterrupt:
                q.stop()
                GPIO.cleanup()
        elif message.message == 'temperatura':
            itCan = 0
            while itCan == 0:
                result = instance.read()
                if result.is_valid():
                   print("Temperature: %d C" % result.temperature)
                   pubnub.publish().channel(channel).message({'tipo': '2','mensaje': result.temperature}).sync()
                   itCan = 1
        elif message.message == 'estado':
            itCan = 0
            print("entró")
            while itCan == 0:
                result = instance.read()
                if result.is_valid():
                   print("Temperature: %d C" % result.temperature)
                   #pubnub.publish().channel(channel).message({'tipo': '2','mensaje': result.temperature}).sync()
                   itCan = 1
            cadena = str(puertaPrincipal) + ',' + str(puertaGarage) + ',' + str(result.temperature)
            pubnub.publish().channel(channel).message({'tipo': '0','mensaje': cadena}).sync()
            print(cadena)
        elif message.message == 'estadoDoors':
            cadena = str(puertaPrincipal) + ',' + str(puertaGarage)
            pubnub.publish().channel(channel).message({'tipo': '0','mensaje': cadena}).sync()
            print(cadena)
        elif message.message == 'estadoLeds':
            cadena=str(led1)+','+str(led2)+','+str(led3)+','+str(led4)+','+str(led5)+','+str(ext)+','+str(led6)
            pubnub.publish().channel(channel).message({'tipo': '4','mensaje': cadena}).sync()
            print(cadena)
        elif message.message == 'estadoSecurity':
            cadena = str(gas)+ ',' + str(pir)
            pubnub.publish().channel(channel).message({'tipo': '5','mensaje': cadena}).sync()
            print(cadena)
        elif message.message == 'security1Low':
            print('entró gas')
            gas = 1
        elif message.message == 'security1High':
            gas = 0
        elif message.message == 'security2Low':
            pir = 1
        elif message.message == 'security2High':
            pir = 0
        elif message.message == 'led1Low': #Amarillo
            led1=1
            GPIO.output(15, GPIO.HIGH)
        elif message.message == 'led1High':
            led1=0
            GPIO.output(15, GPIO.LOW)
        elif message.message == 'led2Low': #Rojo
            led2=1
            GPIO.output(16, GPIO.HIGH)
        elif message.message == 'led2High':
            led2=0
            GPIO.output(16, GPIO.LOW)
        elif message.message == 'led3Low': #Naranja
            led3=1
            GPIO.output(18, GPIO.HIGH)
        elif message.message == 'led3High':
            led3=0
            GPIO.output(18, GPIO.LOW)
        elif message.message == 'led4Low': #Azul
            led4=1
            GPIO.output(19, GPIO.HIGH)
        elif message.message == 'led4High':
            led4=0
            GPIO.output(19, GPIO.LOW)
        elif message.message == 'led5Low': #Verde
            led5=1
            GPIO.output(21, GPIO.HIGH)
        elif message.message == 'led5High':
            led5=0
            GPIO.output(21, GPIO.LOW)
        elif message.message == 'led6Low': #Exteriores
            ext=1
            GPIO.output(22, GPIO.HIGH)
            GPIO.output(23, GPIO.HIGH)
            GPIO.output(32, GPIO.HIGH)
            GPIO.output(33, GPIO.HIGH)
            GPIO.output(35, GPIO.HIGH)
            GPIO.output(36, GPIO.HIGH)
            GPIO.output(37, GPIO.HIGH)
            GPIO.output(38, GPIO.HIGH)
        elif message.message == 'led6High':
            ext=0
            GPIO.output(22, GPIO.LOW)
            GPIO.output(23, GPIO.LOW)
            GPIO.output(32, GPIO.LOW)
            GPIO.output(33, GPIO.LOW)
            GPIO.output(35, GPIO.LOW)
            GPIO.output(36, GPIO.LOW)
            GPIO.output(37, GPIO.LOW)
            GPIO.output(38, GPIO.LOW)
        elif message.message == 'led7Low': #Ventilador
            led6=1
            GPIO.output(40, GPIO.HIGH)
        elif message.message == 'led7High':
            led6=0
            GPIO.output(40, GPIO.LOW)

print('Listening...')
pubnub.add_listener(Listener())
pubnub.subscribe().channels(channel).execute()
pubnub.publish().channel(channel).message("Holawas").sync()
try:
    while True:
        # previous_state = current_state
        # current_state = GPIO.input(11)
        if GPIO.input(8) and gas == 1: #Si detectamos que el sensor se ha activado por la presencia de vapores
            print("HUMO DETECTADO") #Sacamos por pantalla HUMO DETECTADO
            #GPIO.output(7, False) #Enviamos la señal de activación al buzzer pin 7 HIGH
            pubnub.publish().channel(channel).message({'tipo': '1','mensaje': "Fuga de gas detectada"}).sync()
            time.sleep(5) #La señal (pitido) dura 5 segundos
        #if current_state != previous_state:
        if GPIO.input(12) and pir == 1:
            print("Intruso Detectado")
            pubnub.publish().channel(channel).message({'tipo': '3','mensaje': "Se ha detectado un intruso en tu casa"}).sync()
            time.sleep(1)
# Seguimos a la espera de otra señal por parte del sensor MQ-135 o del sensor PIR
except KeyboardInterrupt:
    print ("El usuario ha forzado la detención del script")
    GPIO.cleanup()
