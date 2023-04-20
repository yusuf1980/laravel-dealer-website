<td>
  @if( !empty($entry->{$column['name']}) )
    
      <img
        src="{{ asset( (isset($column['prefix']) ? $column['prefix'] : '') . $entry->{$column['name']}) }}"
        style="
          max-height: {{ isset($column['height']) ? $column['height'] : "25px" }};
          width: {{ isset($column['width']) ? $column['width'] : "auto" }};
          border-radius: 3px;"
      />
   
  @else
    -
  @endif
</td>
