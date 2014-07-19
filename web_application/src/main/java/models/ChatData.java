package models;

import java.sql.Timestamp;

public class ChatData{
	public ChatData(String userName, String subject, String message,
			String sendDate) {
		super();
		this.userName = userName;
		this.subject = subject;
		this.message = message;
		this.location = null;
		this.sendDate = sendDate;
	}
	public ChatData(String userName, String subject, String message,
			String location, String sendDate) {
		super();
		this.userName = userName;
		this.subject = subject;
		this.message = message;
		this.location = location;
		this.sendDate = sendDate;
	}
	private String userName;
	private String subject;
	private String message;
	private String location;
	private String sendDate;
	public String getUserName() {
		return userName;
	}
	public void setUserName(String userName) {
		this.userName = userName;
	}
	public String getSubject() {
		return subject;
	}
	public void setSubject(String subject) {
		this.subject = subject;
	}
	public String getMessage() {
		return message;
	}
	public void setMessage(String message) {
		this.message = message;
	}
	public String getLocation() {
		return location;
	}
	public void setLocation(String location) {
		this.location = location;
	}
	public String getSendDate() {
		return sendDate;
	}
	public void setSendDate(String sendDate) {
		this.sendDate = sendDate;
	}
}
