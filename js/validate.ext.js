		jQuery.validator.addMethod("greaterThan", 
		function(value, element, params) {

		    if (!/Invalid|NaN/.test(new Date(value))) {
		        return new Date(value) > new Date($(params).val());
		    }

		    return isNaN(value) && isNaN($(params).val()) 
		        || (Number(value) > Number($(params).val())); 
		},'Must be greater than {0}.');	
