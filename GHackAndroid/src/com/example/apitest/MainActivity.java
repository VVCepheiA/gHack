package com.example.apitest;

import java.io.IOException;
import java.io.UnsupportedEncodingException;

import org.apache.http.HttpResponse;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.entity.StringEntity;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicHeader;
import org.apache.http.protocol.HTTP;
import org.json.JSONException;
import org.json.JSONObject;

import android.app.ProgressDialog;
import android.location.Location;
import android.location.LocationListener;
import android.location.LocationManager;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v7.app.ActionBarActivity;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.google.gson.Gson;



public class MainActivity extends ActionBarActivity implements LocationListener{
	
	private TextView userField, subjectField;
	private EditText messageField;
	
	private String userName;
	private String subject;
	private String provider;
	
	private ProgressDialog pDialog;
	
	LocationManager locationManager;
	JSONParser jsonParser = new JSONParser();
	Gson gson = new Gson();
	
	private static final String URL = "https://genesyshackathon2014.pagekite.me/sendMessage";
	private static final String TAG_SUCCESS = "success";
	private static final String TAG_MESSAGE = "message";
	
	private static final long LOCATION_REFRESH_TIME = 1000;
	private static final long LOCATION_REFRESH_DISTANCE = 10;
	
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_main);

		
		
		userName = "David";
		subject = "Genesys Hack";
		
		userField = (TextView)findViewById(R.id.user);
		subjectField = (TextView)findViewById(R.id.subject);
		messageField = (EditText)findViewById(R.id.message);
		
		//mLocationManager = (LocationManager) getSystemService(LOCATION_SERVICE);
		locationManager = (LocationManager) getSystemService(LOCATION_SERVICE);

	    locationManager.requestLocationUpdates(LocationManager.GPS_PROVIDER, LOCATION_REFRESH_TIME,
	            LOCATION_REFRESH_DISTANCE, this);
	    
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {

		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.main, menu);
		return true;
	}

	@Override
	public boolean onOptionsItemSelected(MenuItem item) {
		// Handle action bar item clicks here. The action bar will
		// automatically handle clicks on the Home/Up button, so long
		// as you specify a parent activity in AndroidManifest.xml.
		int id = item.getItemId();
		if (id == R.id.action_settings) {
			return true;
		}
		return super.onOptionsItemSelected(item);
	}
	
	public void onSendBtnClick(View view){
		new PostComment().execute();
	}
	
	class PostComment extends AsyncTask<String, String, String>{
		@Override
		protected void onPreExecute(){
			super.onPreExecute();
			pDialog = new ProgressDialog(MainActivity.this);
			pDialog.setMessage("Posting Comment...");
			pDialog.setIndeterminate(false);
			pDialog.setCancelable(true);
			pDialog.show();
		}
		
		@Override
		protected String doInBackground(String... args ){
			int success;
			//locationManager = (LocationManager)getSystemService(Context.LOCATION_SERVICE);
			//Criteria criteria = new Criteria();
		    //provider = locationManager.getBestProvider(criteria, false);
		    Location location = locationManager.getLastKnownLocation(LocationManager.GPS_PROVIDER);
		    String post_location;
		    if(location!=null){
		    	post_location = Double.toString(location.getLongitude())+","+Double.toString(location.getLatitude());
		    }
		    else{
		    	post_location="";
		    }
		    Log.d("Location",post_location);
			String post_title = subject;
			String post_message = messageField.getText().toString();
			Log.d("text",post_message);
			String post_user = getUserName();
			long unixTime = System.currentTimeMillis() / 1000;
			String post_date = String.valueOf(unixTime);
			//String post_date = new SimpleDateFormat("yyyy-MM-dd HH:mm:ss").format(new Date()).toString();
			Log.d("Date",post_date);
			
			JSONObject jsonObject = new JSONObject();
			try {
				jsonObject.put("userName",post_user);
				jsonObject.put("subject",post_title);
				jsonObject.put("message",post_message);
				jsonObject.put("location",post_location);
				jsonObject.put("sendTime",post_date);
				
				StringEntity se = new StringEntity( jsonObject.toString());  
				se.setContentType(new BasicHeader(HTTP.CONTENT_TYPE, "application/json"));
				DefaultHttpClient httpClient = new DefaultHttpClient();
				HttpResponse response;
				HttpPost httpPost = new HttpPost(URL);
				httpPost.setEntity(se);
                response = httpClient.execute(httpPost);
			} catch (JSONException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			} catch (UnsupportedEncodingException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			} catch (ClientProtocolException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			} catch (IOException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
			
			
			//List<NameValuePair> params = new ArrayList<NameValuePair>();
			//params.add(new BasicNameValuePair("userName",post_user));
			//params.add(new BasicNameValuePair("subject",post_title));
			//params.add(new BasicNameValuePair("message",post_message));
			//params.add(new BasicNameValuePair("location",post_location));
			//params.add(new BasicNameValuePair("sendTime",post_date));
			
			Log.d("request!","starting");
			
			//JSONObject json = jsonParser.makeHttpRequest(URL, "POST", params);
			
			return null;
		}
		
		protected void onPostExecute(String file_url){
			pDialog.dismiss();
			if(file_url != null){
				Toast.makeText(MainActivity.this, file_url, Toast.LENGTH_LONG).show();
			}
		}
	}

	public String getUserName() {
		return userName;
	}

	public void setUserName(String userName) {
		this.userName = userName;
	}

	@Override
	public void onLocationChanged(Location location) {
		// TODO Auto-generated method stub
		
	}

	@Override
	public void onProviderDisabled(String provider) {
		// TODO Auto-generated method stub
		
	}

	@Override
	public void onProviderEnabled(String provider) {
		// TODO Auto-generated method stub
		
	}

	@Override
	public void onStatusChanged(String provider, int status, Bundle extras) {
		// TODO Auto-generated method stub
		
	}
	
	

	

}
