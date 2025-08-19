# script.py
import sys
import json
import os
from PIL import Image

def main(args):
	if len(args) != 3:
		return "Usage: script.py <folder> <photo>"
	folder = args[1]
	photo = args[2]
	result = f"Received param1: {folder}, param2: {photo}"
	#print(result)

	result = {
		"folder": folder,
		"photo": photo
	}
	
	# Path to your image
	image_path = f"C:\\xampp\\htdocs\\carneUniversitarioTesis\\public\\storage\\{folder}\\1_validado\\{photo}"
	image_compressed_path = f"C:\\xampp\\htdocs\\carneUniversitarioTesis\\public\\storage\\{folder}\\1_validado\\compressed_{photo}"

	# Abrir la imagen original
	img = Image.open(image_path)

	# Definir el nivel de calidad para la compresión (0 a 100, donde 100 es la mejor calidad)
	calidad = 50  # Puedes ajustar este valor entre 0 y 100 para cambiar la compresión

	# Guardar la imagen comprimida en un nuevo archivo
	# Modificar la resolución DPI
	dpi = (300, 300)  # DPI horizontal y vertical
	img.save(image_compressed_path, 'JPEG', quality=calidad, dpi = dpi)

	# print("Imagen comprimida y guardada.")

	peso = os.path.getsize(image_compressed_path)

	# print(f"El peso de la imagen es: {peso} bytes, {peso/1024} Kilobytes")
	result["peso"] = peso/1024

	return result

if __name__ == "__main__":
    result = main(sys.argv)
    print(json.dumps(result))
    # print(result)