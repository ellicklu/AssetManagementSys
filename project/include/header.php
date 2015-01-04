<!--<%@ page language="java" contentType = "text/html;charset = UTF-8" pageEncoding="UTF-8"%>
<%@ page import="com.big.filetracking.bean.AccountBean" %>
 <%        
   response.setHeader("Pragma","No-cache");
   response.setHeader("Cache-Control","no-cache");     
   response.setDateHeader("Expires",0); 
   request.setCharacterEncoding("UTF-8"); 
   %>  

  <% 
  AccountBean account = (AccountBean) session.getAttribute("Account");

  if ( account == null || account.getName() == null) {
	  response.sendRedirect("../login.jsp");
	  return;
  }%>-->