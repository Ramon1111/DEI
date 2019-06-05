#coding=utf-8
import RPi.GPIO as GPIO #Importamos la librería GPIO
import time #Usaremos timer.sleep asi que hay que importar time

GPIO.setmode(GPIO.BCM) #Ajustamos la placa en modo BCM
GPIO.setup(4, GPIO.IN) #Indicamos que el pin 4 será de entrada

GPIO.setup(7, GPIO.OUT) #Indicamos que el pin 7 será de salida

GPIO.output(7,True) #Indicamos que el pin 7 esta LOW (sin señal)

try:
    while True:
        if GPIO.input(4): #Si detectamos que el sensor se ha activado por la presencia de vapores
            print "HUMO DETECTADO" #Sacamos por pantalla HUMO DETECTADO
            GPIO.output(7, False) #Enviamos la señal de activación al buzzer pin 7 HIGH
            time.sleep(5) #La señal (pitido) dura 5 segundos
            GPIO.output(7,True) #Cerramos la señal poniendo el pin 7 en LOW y el buzzer se calla.
	print "Hello there"
# Seguimos a la espera de otra señal por parte del sensor MQ-135
except KeyboardInterrupt:
    print "El usuario ha forzado la detención del script"
    GPIO.cleanup()
#Con keyboardinterrupt detectamos si el usuario pulsa CONTROL + C y #si es asi
#cerramos el script y "limpiamos" los pines GPIO con GPIO.cleanup()
