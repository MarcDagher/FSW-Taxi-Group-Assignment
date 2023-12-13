import { BrowserRouter , Routes , Route } from "react-router-dom";
import MapPage from "./Pages/MapPage";
import './App.css'

function App() {

  return (
    <>
      <BrowserRouter>
      <Routes>
        <Route path="/map" element={<MapPage/>}/>
      </Routes>
      </BrowserRouter>
    </>
  )
}

export default App
