# script.py
import sys
import json
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

	# image_path_updated = f"C:\\xampp\\htdocs\\carneUniversitarioTesis\\public\\storage\\{folder}\\5_temps\\modificada_dpi_{photo}"
	image_path_updated = base_path / ".." / "storage" / folder / "5_temps" / f"modificada_dpi_{photo}"
	# Normaliza la ruta final
	image_path_updated = image_path_updated.resolve()

	# Open the image
	with Image.open(image_path) as img:
		# Get DPI information
		result_old = img.info.get('dpi', (None, None))
		# print(f"DPI: {result_old[0]}, {result_old[1]}")
		result['old_dpi'] = {"horizontal":result_old[0], "vertical":result_old[0]}

	# Abrir la imagen
	imagen_nueva = Image.open(image_path)

	# Modificar la resolución DPI
	dpi = (300, 300)  # DPI horizontal y vertical
	imagen_nueva.save(image_path_updated, dpi=dpi, quality=99)

	# Get DPI information
	image_nueva_path = image_path_updated

	with Image.open(image_nueva_path) as img_nueva:
		# Get DPI information
		result_new = img_nueva.info.get('dpi', (None, None))
		# print(f"DPI NUEVA: {result_new[0]}, {result_new[1]}")
		result['new_dpi'] = {"horizontal":result_new[0], "vertical":result_new[0]}

		# print(f"Imagen guardada con DPI: {dpi}")
	# return result
	return result

if __name__ == "__main__":
    result = main(sys.argv)
    print(json.dumps(result))
    # print(result)