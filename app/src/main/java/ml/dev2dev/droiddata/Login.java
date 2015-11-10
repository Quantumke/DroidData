package ml.dev2dev.droiddata;


import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Intent;
import android.graphics.Color;
import android.os.Bundle;
import android.support.design.widget.Snackbar;
import android.support.design.widget.TextInputLayout;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

import ml.dev2dev.droiddata.app.AppConfig;
import ml.dev2dev.droiddata.app.AppController;
import ml.dev2dev.droiddata.app.SessionManager;


/**
 * Created by benson on 10/13/15.
 */
public class Login extends AppCompatActivity implements View.OnClickListener{


    TextView register;
    Button signIn;
    TextInputLayout emailLogin;
    TextInputLayout passwordLogin;
    EditText etEmailLogin;
    EditText etPasswordLogin;

    private ProgressDialog progressDialog;
    private SessionManager session;
    

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);


        //initializing toolbar
        Toolbar toolBar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolBar);
        //initializing views
        register=(TextView)findViewById(R.id.register);
        signIn=(Button)findViewById(R.id.signin_button);
        emailLogin=(TextInputLayout)findViewById(R.id.email_loginlayout);
        passwordLogin=(TextInputLayout)findViewById(R.id.password_loginlayout);
        etEmailLogin = (EditText) findViewById(R.id.email_login);
        etPasswordLogin = (EditText) findViewById(R.id.password_login);
        //setting onclick listeners
        register.setOnClickListener(this);
        signIn.setOnClickListener(this);

        //setting progressDialog
        progressDialog = new ProgressDialog(this);
        progressDialog.setCancelable(false);


        session = new SessionManager(getApplicationContext());


        //If the session is logged in move to MainActivity
        if (session.isLoggedIn()) {
            Intent intent = new Intent(Login.this, Resources.class);
            startActivity(intent);
            finish();
        }
    }


    /**
     * function to verify login details
     * */
    private void checkLogin(final String email, final String password) {
        // Tag used to cancel the request
        String tag_string_req = "req_login";

        progressDialog.setMessage("Logging in ...");
        showDialog();

        StringRequest strReq = new StringRequest(Request.Method.POST,
                AppConfig.URL_REGISTER, new Response.Listener<String>() {

            @Override
            public void onResponse(String response) {
                hideDialog();

                try {
                    JSONObject jObj = new JSONObject(response);
                    String userId= jObj.getString("uid");

                    if (userId!=null) {
                        // user successfully logged in
                        // Create login session
                        session.setLogin(true);

                        // Launching  main activity
                        Intent intent = new Intent(Login.this,
                                Resources.class);
                        startActivity(intent);
                        finish();
                    } else {
                        // login error
                        String errorMsg = jObj.getString("error_msg");
                        Toast.makeText(getApplicationContext(),
                                errorMsg, Toast.LENGTH_LONG).show();
                    }
                } catch (JSONException e) {
                    e.printStackTrace();
                }

            }
        }, new Response.ErrorListener() {

            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(getApplicationContext(),
                        error.getMessage(), Toast.LENGTH_LONG).show();
                hideDialog();
            }
        }) {

            @Override
            protected Map<String, String> getParams() {
                // Post params to login url
                Map<String, String> params = new HashMap<String, String>();
                params.put("tag", "login");
                params.put("email", email);
                params.put("password", password);

                return params;
            }

        };

        // Adding request to  queue
        AppController.getInstance().addToRequestQueue(strReq, tag_string_req);
    }

    /*
    function to show dialog
     */
    private void showDialog() {
        if (!progressDialog.isShowing())
            progressDialog.show();
    }

    /*
    function to hide dialog
     */
    private void hideDialog() {
        if (progressDialog.isShowing())
            progressDialog.dismiss();
    }



    @Override
    public void onClick(View v) {
        switch (v.getId())
        {
            //on clicking register button move to Register Activity
            case R.id.register:
                Intent intent = new Intent(getApplicationContext(),
                       ml.dev2dev.droiddata.Register.class);
                startActivity(intent);
                finish();
                break;

            //on clicking the signin button check for the empty field then call the checkLogin() function
            case R.id.signin_button:
                String email = etEmailLogin.getText().toString();
                String password = etPasswordLogin.getText().toString();

                // Check for empty data
                if (email.trim().length() > 0 && password.trim().length() > 0) {
                    // login user
                    checkLogin(email, password);
                } else {
                    // show snackbar to enter credentials
                    Snackbar.make(v, "Please Fill all Data", Snackbar.LENGTH_LONG)
                            .show();
                }
                break;
        }
    }
}
