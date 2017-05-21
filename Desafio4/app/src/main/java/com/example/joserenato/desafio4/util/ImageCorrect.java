package com.example.joserenato.desafio4.util;

import com.example.joserenato.desafio4.Images;
import com.example.joserenato.desafio4.Text;
import com.google.gson.Gson;
import com.google.gson.JsonDeserializationContext;
import com.google.gson.JsonDeserializer;
import com.google.gson.JsonElement;
import com.google.gson.JsonParseException;

import java.lang.reflect.Type;

/**
 * Created by JoseRenato on 20/05/2017.
 */

public class ImageCorrect implements JsonDeserializer<Images>{
    @Override
    public Images deserialize(JsonElement json, Type typeOfT, JsonDeserializationContext context) throws JsonParseException {
        JsonElement element = json.getAsJsonObject();
        if(json.getAsJsonObject() != null){
            element = json.getAsJsonObject();
        }
        return (new Gson().fromJson(element, Images.class));
    }
}
