import { yellow } from "@material-ui/core/colors";
import React from "react";

export default function Footer() {
  return (
    <div>
      <div className="container" style={{borderTop:"2px solid white"}}>
        <footer className="d-flex justify-content-between align-items-center py-2 my-1">
          <div className="col-md-4 d-flex align-items-center justify-content-center">
            <p>
              © 2023 <i>GoFood</i>, Inc&nbsp;
              <span style={{ color: "yellow", fontWeight: "600"}}>
                Developed by Nagpal & Kumar
              </span>
            </p>
          </div>
        </footer>
      </div>
    </div>
  );
}
