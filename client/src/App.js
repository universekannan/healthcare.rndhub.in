import "./App.css";
import { Routes, Route, BrowserRouter } from "react-router-dom";
import Add from "./pages/Add";
import Update from "./pages/Update";
import Login from "./pages/Login";
import Sidemenu from "./pages/Sidemenu";
import Patient from "./pages/Patient";
import Adduser from "./pages/Adduser";
import Users from "./pages/Users";
import UserPermission from "./pages/users/Permission";
import Dashboard from "./pages/Dashboard";
import Patients from "./pages/patients/Patients";

function App() {
  return (
    <div className="App">
      <Sidemenu/>
      <BrowserRouter>
        <Routes>
          <Route path="/" element={<Login />} />
          <Route path="/add" element={<Add />} />
          <Route path="/update:id" element={<Update />} />
          <Route path="/Patient" element={<Patient />} />
          <Route path="/Adduser" element={<Adduser />} />
          <Route path="Users/Permission" element={<UserPermission />} />
          <Route path="/Dashboard" element={<Dashboard />} />
          <Route path="/Users" element={<Users />} />
          <Route path="/Patients" element={<Patients />} />


        </Routes>
      </BrowserRouter>
    </div>
  );
}

export default App;
