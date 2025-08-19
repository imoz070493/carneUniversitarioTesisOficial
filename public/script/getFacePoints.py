# script.py
import sys
import json
import cv2
import mediapipe as mp
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
	#image_path = f"C:\\xampp\\htdocs\\carneUniversitarioTesis\\public\\storage\\{folder}\\5_temps\\{photo}"
	image_path = base_path / ".." / "storage" / folder / "5_temps" / photo

	# Normaliza la ruta final
	image_path = image_path.resolve()

	# Inicializar Face Detection
	mp_face_detection = mp.solutions.face_detection
	mp_drawing = mp.solutions.drawing_utils

	# Cargar la imagen estática
	image = cv2.imread(image_path)

	# Verificar si la imagen fue cargada correctamente
	if image is None:
		print("Error al cargar la imagen.")
		exit()

	# Convertir BGR a RGB para MediaPipe
	image_rgb = cv2.cvtColor(image, cv2.COLOR_BGR2RGB)

	# Detectar caras en la imagen
	with mp_face_detection.FaceDetection(min_detection_confidence=0.5) as face_detection:
		results = face_detection.process(image_rgb)

		if results.detections:
			for detection in results.detections:
				# Dibujar el cuadro delimitador y puntos clave
				mp_drawing.draw_detection(image, detection)

				# Obtener coordenadas de los puntos clave
				# print(detection.location_data.relative_keypoints)
				keypoints = detection.location_data.relative_keypoints

				# Obtener coordenadas de puntos clave
				left_eye_x, left_eye_y = int(round(keypoints[0].x,10)*240), int(round(keypoints[0].y,10)*288)
				right_eye_x, right_eye_y = int(round(keypoints[1].x,10)*240), int(round(keypoints[1].y,10)*288)
				nose_tip_x, nose_tip_y = int(round(keypoints[2].x,10)*240), int(round(keypoints[2].y,10)*288)
				mouth_center_x, mouth_center_y = int(round(keypoints[3].x,10)*240), int(round(keypoints[3].y,10)*288)
				left_ear_x, left_ear_y = int(round(keypoints[4].x,10)*240), int(round(keypoints[4].y,10)*288)
				right_ear_x, right_ear_y = int(round(keypoints[5].x,10)*240), int(round(keypoints[5].y,10)*288)

				# Mostrar las coordenadas normalizadas
				# print(f"Ojo izquierdo: (x={left_eye_x}, y={left_eye_y})")
				# print(f"Ojo derecho: (x={right_eye_x}, y={right_eye_y})")
				# print(f"Punta de la nariz: (x={nose_tip_x}, y={nose_tip_y})")
				# print(f"Centro de la boca: (x={mouth_center_x}, y={mouth_center_y})")
				# print(f"Oreja izquierda: (x={left_ear_x}, y={left_ear_y})")
				# print(f"Oreja derecha: (x={right_ear_x}, y={right_ear_y})")
				result["left_eye"] = {'x': left_eye_x,'y': left_eye_y}
				result["right_eye"] = {'x': right_eye_x,'y': right_eye_y}
				result["nose_tip"] = {'x': nose_tip_x,'y': nose_tip_y}
				result["mouth_center"] = {'x': mouth_center_x,'y': mouth_center_y}
				result["left_ear"] = {'x': left_ear_x,'y': left_ear_y}
				result["right_ear"] = {'x': right_ear_x,'y': right_ear_y}

	# Mostrar la imagen procesada
	# cv2.imshow('Face Detection', image)
	cv2.waitKey(0)
	cv2.destroyAllWindows()

	# return f"{result[0]},{result[1]}"
	return result

if __name__ == "__main__":
    result = main(sys.argv)
    print(json.dumps(result))