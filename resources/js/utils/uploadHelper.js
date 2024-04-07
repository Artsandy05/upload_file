import axios from 'axios';

export async function upload(data) {
  try {
    const formData = new FormData();
    formData.append('file', data.file[0]);

    const response = await axios.post('/api/upload-file', formData, );

    console.log('File uploaded successfully:', response.data);
  } catch (error) {
    console.error('Error uploading file:', error);
  }
}
