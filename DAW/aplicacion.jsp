<!DOCTYPE html>
<%@ page import="java.sql."%>
<%@ page import="javax.sql."%>
<%@ page import="javax.naming.*"%>
<%! int diaRandom;
int fechaActual;
int resultado;
%>

<html lang="es">
    <head>
        <meta charset="UTF-8">
        <style>
            body{
                justify-content: center;
                align-items: center;
                display: grid;
                background-image:url("flores.jpg");
                background-color: #cccccc;
                background-repeat: no-repeat;
            }
        </style> 
    </head>
    <body>
        <h1>Searching Crush</h1>
        <%
            diaRandom = (int) (Math.random() * 9 + 2022);
            fechaActual = Calendar.getInstance().get(Calendar.YEAR);
            resultado = diaRandom-fechaActual;
            if(session.getAttribute("session")!=null){
                session.setAttribute("session", (int) session.getAttribute("session")+1);
            }else{
                session.setAttribute("session", 1);
            }
            if(resultado==0){
                out.println("<h1>NUNCA</h1>");
            }else{
                out.println("<h1>"+ resultado + " años" + "</h1>"); 
            }
            try {
                Connection con = null;
                InitialContext initialContext = new InitialContext();
                DataSource dataSource = (DataSource)initialContext.lookup("java:comp/env/jdbc/baseservidor");
                con = dataSource.getConnection();
                int cont = (int) session.getAttribute("session");
                String insertSql = "INSERT INTO crush (Intento, Año) VALUES (?,?)";
                PreparedStatement insertStmt = con.prepareStatement(insertSql);
                insertStmt.setInt(1, cont);
                insertStmt.setInt(2, resultado);
                insertStmt.executeUpdate();
                con.close();
            } catch (NamingException | SQLException e) {
                e.printStackTrace();
            }
        %>
        <br>
        <form method="POST" action="<%= request.getContextPath() %>/index.jsp">
            <input type="submit" value="<%= "CRUSH" %>"/>
        </form>
    </body>
</html>