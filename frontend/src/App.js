import logo from './logo.svg';
import './App.css';
import Login from './Components/Login';
import PremDash from './Components/Premium/PremDash';

import Dashboard from './Components/Admin/Dashboard';

import {BrowserRouter,Route,Routes} from 'react-router-dom';
function App() {
  return (
    <div>
      <BrowserRouter>
        <Routes>
          <Route path="/" element={<Login />} />
          <Route path="/premium" element={<PremDash />} />
          <Route path="/admin" element={<Dashboard />} />
        </Routes>
      </BrowserRouter>
    </div>
    
  );
}

export default App;
