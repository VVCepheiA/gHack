package ghack;

import models.ChatData;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

import com.google.gson.Gson;
import com.google.gson.GsonBuilder;

@RestController
public class HomeController {

	@Autowired
	private HomeRepository homeRepository = new HomeRepository();
	
	@RequestMapping(value = "/getData")
	public ChatData getData(@RequestParam("id") String id){
		Application.logger.info(id);
		return null;
	}
	public class ChatDataObject{
		private String message;
		public ChatDataObject(String message){
			this.message = message;
		}
		public void setMessage(String message){
			this.message = message;
		}
		public String getMessage(){
			return message;
		}
	}
	@RequestMapping(value = "/sendMessage", method = RequestMethod.POST)
	public void sendMessage(@RequestBody String json){
		Application.logger.info("JSON: "+json);
        Gson gson = new GsonBuilder().create();
        ChatData chatData = gson.fromJson(json, ChatData.class);
		homeRepository.addRow(chatData);
	}
}
