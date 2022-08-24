import './App.css';
import Login from './Components/Login';
import PremDash from './Components/Premium/PremDash';
import Dashboard from './Components/Admin/Dashboard';
import {BrowserRouter,Route,Routes} from 'react-router-dom';
import TopMenu from './Components/TopMenu';
import Registration from './Components/Registration';


function App() {
  return (
    <div>
      <BrowserRouter>
        <TopMenu/>
        
        <Routes>
            <Route path="/" element={<Login/>}></Route>
            <Route path="/reg" element={<Registration/>}></Route>
            </Routes>
            
      </BrowserRouter>
    </div>
    
  );
}

export default App;
