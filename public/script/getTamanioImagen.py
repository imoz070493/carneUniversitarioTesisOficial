# script.py
import sys
import json
import os
from PIL import Image
from pathlib import Path

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
	base_path = Path(__file__).resolve().parent
	
	# Path to your image
	# image_path = f"C:\\xampp\\htdocs\\carneUniversitarioTesis\\public\\storage\\{folder}\\5_temps\\{photo}"
	image_path = base_path / ".." / "storage" / folder / "5_temps" / photo

	# Normaliza la ruta final
	image_path = image_path.resolve()

	# Obtener el tamaño del archivo en bytes
	peso = os.path.getsize(image_path)
	result["peso"] = peso/1024

	# Obtener las dimensiones de una imagen
	# Abrir la imagen
	with Image.open(image_path) as img:
		width, height = img.size  # <-- Aquí obtienes las dimensiones
		# print(f"Ancho: {width} píxeles")
		# print(f"Alto: {height} píxeles")
		result["width"] = width
		result["height"] = height

	return result

if __name__ == "__main__":
    result = main(sys.argv)
    print(json.dumps(result))
    # print(result)