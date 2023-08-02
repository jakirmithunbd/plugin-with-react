import { useState } from "react"

const useInput = (fields) => {

    const [input, setinput] = useState(fields)

    const handleInput = (e) => {
        setinput((prevState) => ({
            ...prevState,
            [e.target.name]: e.target.value
        }))
    }

  return {input, handleInput, setinput}
}

export default useInput