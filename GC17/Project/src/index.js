import { createRoot } from "react-dom/client";
import { BrowserRouter } from "react-router-dom";

import App from "./App";
import { AuthProvider } from "./Context/AuthContext";

const rootElement = document.getElementById("root");
const root = createRoot(rootElement);

root.render(
<AuthProvider>
  <BrowserRouter>
    
    <App />
  
  </BrowserRouter>
  </AuthProvider>
);
