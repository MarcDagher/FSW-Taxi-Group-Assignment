/* eslint-disable react/prop-types */
import './index.css'

const Form = (props) => {
  return <div className='form'>
    <h1>Taxina</h1>
    <p className='form-title'>{props.title}</p>
    
    {props.children}

  </div>
}

export default Form