package com.example.hitesh.testing2;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.ImageView;

public class LogActivity extends AppCompatActivity {

    private ImageView internet_error;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate( savedInstanceState );
        setContentView( R.layout.activity_log );

        internet_error = findViewById(R.id.internet_error);

        if (AppStatus.getInstance(getApplication()).isOnline()) {
            WebView webView = findViewById(R.id.log_webview);
            webView.setWebViewClient(new WebViewClient());

            webView.loadUrl("http://ducic.ac.in/kkt/log.php");

            WebSettings webSettings = webView.getSettings();
            webSettings.setJavaScriptEnabled(true);

        } else {

            internet_error.setVisibility( View.VISIBLE);

        }


    }
}
