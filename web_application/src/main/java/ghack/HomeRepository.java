package ghack;

import java.sql.Timestamp;

import javax.sql.DataSource;

import models.ChatData;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.stereotype.Repository;

@Repository
public class HomeRepository {

	@Autowired
	private JdbcTemplate jdbcTemplateObject;

	public void setDataSource(DataSource dataSource) {
		this.jdbcTemplateObject = new JdbcTemplate(dataSource);
	}
	
	public void addRow(ChatData chatData){
		addRow(chatData.getUserName(), chatData.getSubject(), chatData.getMessage(), chatData.getLocation(), chatData.getSendDate());
	}
	
	public void addRow(String userName, String subject, String message, String location, String sendDate){
		String SQL = "INSERT INTO chatdata";
		SQL += (" VALUES ('" + userName + "', '" + subject + "', '" + message + "', '" + location + "', '" + sendDate + "')");
		jdbcTemplateObject.update(SQL);
	}
}
