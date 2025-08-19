# script.py
import sys
from PIL import Image
from array import array
import json
from pathlib import Path

def main(args):
	if len(args) != 4:
		return "Usage: script.py <folder> <subfolder> <photo>"
	folder = args[1]
	subfolder = args[2]
	photo = args[3]
	# result = f"Received param1: {folder}, param2: {photo}"
	#print(result)

	result = {
		"folder": folder,
		"subfolder": subfolder,
		"photo": photo
	}
	base_path = Path(__file__).resolve().parent

	# Path to your image
	# image_path = f"C:\\xampp\\htdocs\\carneUniversitario\\public\\storage\\{folder}\\1_validado\\{photo}"
	# image_path = f"C:\\xampp\\htdocs\\carneUniversitarioTesis\\public\\storage\\{folder}\\{subfolder}\\{photo}"
	image_path = base_path / ".." / "storage" / folder / subfolder / photo

	# Normaliza la ruta final
	image_path = image_path.resolve()

	# Open the image
	with Image.open(image_path) as img:
		# Get DPI information
		horizontal_dpi, vertical_dpi  = img.info.get('dpi', (None, None))
		# result['algo']="Imagen Encontrada"
		# print(f"DPI: {dpi}")
		result["horizontal_dpi"] = str(horizontal_dpi)
		result["vertical_dpi"] = str(vertical_dpi)

	return result

if __name__ == "__main__":
    result = main(sys.argv)
    print(json.dumps(result))
    # print(result)