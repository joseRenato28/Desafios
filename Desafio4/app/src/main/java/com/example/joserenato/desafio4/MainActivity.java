package com.example.joserenato.desafio4;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.example.joserenato.desafio4.helper.ImageHelper;
import com.example.joserenato.desafio4.services.Services;
import com.example.joserenato.desafio4.util.ImageCorrect;
import com.example.joserenato.desafio4.util.TextCorrect;
import com.google.gson.Gson;
import com.google.gson.GsonBuilder;

import java.util.ArrayList;
import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.GsonConverterFactory;
import retrofit2.Response;
import retrofit2.Retrofit;

public class MainActivity extends AppCompatActivity {
    public static final String url = "http://138.197.72.112:80/desafio3/api/";

    List<Images> listImages = new ArrayList<>();
    public ImageView image1;
    public ImageView image2;
    public ImageView image3;
    public ImageView image4;

    public TextView text1;
    public TextView text2;
    public TextView text3;
    public TextView text4;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        setContentView(R.layout.activity_main);

        final TextView message = (TextView)findViewById(R.id.messageText);


        Gson g = new GsonBuilder().registerTypeAdapter(Text.class, new TextCorrect()).create();

        Retrofit retrofit = new Retrofit.Builder()
                .baseUrl(url)
                .addConverterFactory(GsonConverterFactory.create(g))
                .build();

        Services service  = retrofit.create(Services.class);

        Call<List<Text>> text = service.getText();


        text.enqueue(new Callback<List<Text>>() {
            @Override
            public void onResponse(Call<List<Text>> call, Response<List<Text>> response) {
                if(response.isSuccessful()){
                    List<Text> texts = response.body();

                    for(Text t: texts){
                        message.setText(t.getMain_text());
                    }

                }else{
                    Toast.makeText(getApplicationContext(), "Nao conectou "+response.code(), Toast.LENGTH_LONG).show();
                }
            }

            @Override
            public void onFailure(Call<List<Text>> call, Throwable t) {
                t.printStackTrace();
                Toast.makeText(getApplicationContext(), "Erro "+t.getMessage(), Toast.LENGTH_LONG).show();
            }
        });

        Gson i = new GsonBuilder().registerTypeAdapter(Images.class, new ImageCorrect()).create();

        Retrofit retrofitI = new Retrofit.Builder()
                .baseUrl(url)
                .addConverterFactory(GsonConverterFactory.create(i))
                .build();

        Services serviceI  = retrofitI.create(Services.class);
        Call<List<Images>> images = serviceI.getImages();

        images.enqueue(new Callback<List<Images>>() {
            @Override
            public void onResponse(Call<List<Images>> call, Response<List<Images>> response) {

                if(response.isSuccessful()){
                    List<Images> image = response.body();
                    image1 = (ImageView)findViewById(R.id.image1);
                    image2 = (ImageView)findViewById(R.id.image2);
                    image3 = (ImageView)findViewById(R.id.image3);
                    image4 = (ImageView)findViewById(R.id.image4);

                    text1 = (TextView)findViewById(R.id.text1);
                    text2 = (TextView)findViewById(R.id.text2);
                    text3 = (TextView)findViewById(R.id.text3);
                    text4 = (TextView)findViewById(R.id.text4);

                    for(Images i: image){
                        Images im = new Images();

                        im.setId_image(i.getId_image());
                        im.setRoute_image(i.getRoute_image());
                        im.setTitle_image(i.getTitle_image());

                        listImages.add(im);
                    }

                    new ImageHelper(image1).execute(listImages.get(0).getRoute_image());
                    new ImageHelper(image2).execute(listImages.get(1).getRoute_image());
                    new ImageHelper(image3).execute(listImages.get(2).getRoute_image());
                    new ImageHelper(image4).execute(listImages.get(3).getRoute_image());

                    text1.setText(listImages.get(0).getTitle_image());
                    text2.setText(listImages.get(1).getTitle_image());
                    text3.setText(listImages.get(2).getTitle_image());
                    text4.setText(listImages.get(3).getTitle_image());

                }else{
                    Toast.makeText(getApplicationContext(), "Nao conectou "+response.code(), Toast.LENGTH_LONG).show();
                }
            }

            @Override
            public void onFailure(Call<List<Images>> call, Throwable t) {
                t.printStackTrace();
                Toast.makeText(getApplicationContext(), "Erro "+t.getMessage(), Toast.LENGTH_LONG).show();
            }
        });
    }
}
