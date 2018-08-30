package com.example.hitesh.testing2.Fragments;

import android.os.Bundle;
import android.support.annotation.Nullable;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.ImageView;

import com.example.hitesh.testing2.AppStatus;
import com.example.hitesh.testing2.R;

/**
 * Created by hitesh on 10/01/18.
 */

public class FragmentOne extends android.support.v4.app.Fragment {

    ImageView internet_error;

    @Nullable
    @Override
    public View onCreateView(LayoutInflater inflater, @Nullable ViewGroup container, Bundle savedInstanceState) {

        View v=inflater.inflate(R.layout.frag_one, container, false);

        internet_error = v.findViewById(R.id.internet_error);

        if (AppStatus.getInstance(getActivity()).isOnline()) {
            WebView webView = v.findViewById(R.id.webview);
            webView.setWebViewClient(new WebViewClient());

            webView.loadUrl("http://ducic.ac.in/kkt/contactus.php");

            WebSettings webSettings = webView.getSettings();
            webSettings.setJavaScriptEnabled(true);

        } else {

            internet_error.setVisibility(View.VISIBLE);

        }

        return v;
    }

    @Override
    public void onViewCreated(View view, @Nullable Bundle savedInstanceState) {
        super.onViewCreated(view, savedInstanceState);
    }
}
