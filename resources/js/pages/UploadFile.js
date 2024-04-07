import './UploadFile.css';
import ReactDOM from 'react-dom';
import { useForm } from 'react-hook-form';
import { upload } from '../utils/uploadHelper';

const UploadFile = () => {
  const { register, handleSubmit } = useForm();

  return (
    <form className='uploadForm' onSubmit={handleSubmit(upload)}>
      
      <input type="file" {...register('file')} />
      <button type="submit">Upload</button>
    </form>
  );
};

export default UploadFile;


if (document.getElementById('main')) {
  ReactDOM.render(<UploadFile />, document.getElementById('main'));
}
