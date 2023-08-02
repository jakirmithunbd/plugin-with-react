import React, { useEffect, useState } from 'react'
import axios from 'axios'
import useInput from '../hooks/useInput'

function Settings() {

    const {input, handleInput, setinput} = useInput({
        firstname: '',
        lastname: '',
        email: '',
        phone: '',
    })

  const [enable_cookie, setenable_cookie] = useState()
  const [loader, setLoader] = useState('Save Settings')

  const apiUrl = `${appLocalizer.apiUrl}/cmcookie/v1/settings`;

  const handleCheckbox = (e) => {
    setenable_cookie((prevState) => !prevState)
  }

  const handleSubmit = (e) => {
    e.preventDefault();
    console.log('e', e)
    setLoader('Saving...');
    axios.post(apiUrl, {
        firstname: input.firstname,
        lastname: input.lastname,
        email: input.email,
        phone: input.phone,
        enable_cookie: enable_cookie
    }, {
        headers: {
            'content-type': 'application/json',
            'X-WP-NONCE': appLocalizer.cm_nonce
        }
    })
    
    .then(res => {
        console.log('res', res.config.data)
        setLoader('Save Settings');
    })
  }

  useEffect(() => {
    axios.get(apiUrl).then(res => {
        console.log(res)
        setinput({
            firstname: res.data.firstname,
            lastname: res.data.lastname,
            email: res.data.email,
            phone: res.data.phone,
            enable_cookie: res.data.enable_cookie
        })
    })
  }, [])
  

  return (
    
    <React.Fragment>
      <form method='post' id='wprk-admin-app' onSubmit={ (e) => handleSubmit(e)}>

            <div className='cm-form-wrapper'>
                <div className='settings-fields'>
                    <div className="settings-checkbox-field">
                        <p>Enable Frontend Cookie </p>
                        <input id='cookie_switcher' className="cm-checkbox" name="enable_cookie" checked={enable_cookie} onChange={ handleCheckbox } type="checkbox" />
                        <label htmlFor="cookie_switcher"></label>
                    </div>
                </div>
            </div>

          <table className='form-table' role='presentation'>
              <tbody>
                <tr>
                  <th scope='row'>
                    <lebel htmlFor="firstname">Frist Name:</lebel>
                  </th>

                  <td>
                    <input type="text" id='firstname' name="firstname" onChange={ handleInput } value={input.firstname} className='regular-text' />
                  </td>
                </tr>

                <tr>
                  <th scope='row'>
                    <lebel htmlFor="lastname">Last Name:</lebel>
                  </th>

                  <td>
                    <input type="text" id='lastname' name="lastname" onChange={ handleInput } value={input.lastname} className='regular-text' />
                  </td>
                </tr>

                <tr>
                    <th scope='row'>
                        <lebel htmlFor="email">Email:</lebel>
                    </th>

                    <td>
                        <input type="email" id='email' name="email" onChange={ handleInput } value={input.email} className='regular-text' />
                    </td>
                </tr>

                <tr>
                    <th scope='row'>
                        <lebel htmlFor="phone">Phone:</lebel>
                    </th>

                    <td>
                        <input type="text" id='phone' name="phone" onChange={ handleInput } value={input.phone} className='regular-text' />
                    </td>
                </tr>

                <p className='submit'>
                  <button type='submit' className='button button-primary'>{loader}</button>
                </p>
              </tbody>
          </table>
      </form>
    </React.Fragment>
  )
}

export default Settings