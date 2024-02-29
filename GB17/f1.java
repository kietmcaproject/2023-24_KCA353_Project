package com.Servlet;

import java.io.IOException;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

import com.DAO.UserDAO;
import com.Db.DBConnect;
import com.entity.UserDetails;

@WebServlet("/loginServlet")
public class loginServlet extends HttpServlet {

    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {

        String email = request.getParameter("uemail");
        String password = request.getParameter("upassword");

        UserDetails us = new UserDetails();
        us.setEmail(email);
        us.setPassword(password);

        UserDAO dao = new UserDAO(DBConnect.getConn());
        UserDetails user = dao.loginUser(us);
        HttpSession session = request.getSession();

        if (user != null) {
            session.setAttribute("userD", user);
            response.sendRedirect("home.jsp");
        } else {
            session.setAttribute("Login-error", "Invalid UserName and Password");
            response.sendRedirect("login.jsp");
        }

    }

}