package ml.dev2dev.droiddata;

import android.content.Intent;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;

/**
 * Created by benson on 11/6/15.
 */
public class SecondFragment extends Fragment implements View.OnClickListener {

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {



        View rootView = inflater.inflate(R.layout.login, container,
                false);


//    Button login = (Button ) rootView.findViewById(R.id.lo);
//        login.setOnClickListener(this);
        return rootView;
    }


    @Override
    public void onClick(View rootView) {

//        Intent intent = new Intent (FirstFragment.this.getActivity(),Resources.class);
        Intent i = new Intent(getActivity(), Resources.class);
        getActivity().startActivity(i);


    }
}

