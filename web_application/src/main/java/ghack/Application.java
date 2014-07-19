package ghack;

import org.apache.log4j.Logger;
import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.EnableAutoConfiguration;
import org.springframework.context.annotation.ComponentScan;
import org.springframework.context.annotation.Configuration;

@Configuration
@ComponentScan
@EnableAutoConfiguration
public class Application {

	static Logger logger = Logger.getLogger(Application.class.getName());
    public static void main(String[] args) {
        SpringApplication.run(Application.class, args);
    }
}
