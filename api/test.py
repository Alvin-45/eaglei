import numpy as np
from tensorflow.keras.models import load_model

from keras.applications.vgg16 import preprocess_input
from keras.preprocessing.image import ImageDataGenerator

import mysql.connector

model = load_model('model1.hdf5')
data_generator = ImageDataGenerator(preprocessing_function=preprocess_input)
test_generator = data_generator.flow_from_directory(
    directory = 'uploads',
    target_size = (224,224),
    batch_size = 1,
    class_mode = None,
    shuffle = False,
    seed = 123
)

test_generator.reset()

pred = model.predict_generator(test_generator, steps = len(test_generator), verbose = 1)
print(pred)
predicted_class_indices = np.argmax(pred, axis = 1)
print(predicted_class_indices)
label = ['car_crash','earthquake','firedisaster']



print(label[predicted_class_indices[0]])


file=open("out.txt","w",encoding="utf-8")
file.write(str(label[predicted_class_indices[0]]))
file.close()




