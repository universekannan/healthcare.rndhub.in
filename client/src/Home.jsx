import "./App.css";
import { Routes, Route, BrowserRouter } from "react-router-dom";
import Home from "./pages/Ho";
import Add from "./pages/Add";
import Update from "./pages/Update";
function App() {
  return (
    <div className="App">
      <BrowserRouter>
        <Routes>
          <Route path="/" element={<Home />} />
          <Route path="/add" element={<Add />} />
          <Route path="/update:id" element={<Update />} />
        </Routes>
      </BrowserRouter>
    </div>
  );
}

export default App;
