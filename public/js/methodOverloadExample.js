/**
 * This file is an example of method overloading. This is a little outdated, but
 * essentially is the basics and DOES work.
 */
function Connector() {}
 
Object._overload_(Connector, "open", "string,number,boolean", function(n, m, t) {/* do something */});
Object._overload_(Connector, "open", "string,number", function(n, m) {/* do something */});
Object._overload_(Connector, "open", "string", function(n) {/* do something */});

Object._overload_ = function(obj, name, signature, method) {
    // The first time _overload_ is called, define the method
    if (typeof(obj[name]) == 'undefined') {
        obj[name] = function() {
            var signatureMatches = true, incomingSignatureString = "", args, signatureString;
            //print(print_r(arguments));  // This isn't php... Not sure why he put this here.
            for (var i = 0; i < arguments.length; i++) {
                if (incomingSignatureString !== "") {
                    incomingSignatureString += ",";
                }
                incomingSignatureString += typeof(arguments[i]);
            }

            var method = this.overloadedMethods[name];
            for (signatureString in method.signatures) {
                signatureMatches = (incomingSignatureString === signatureString);
                if (signatureMatches) {
                    return(method.signatures[signatureString].apply(this, arguments));
                }
            }
            
            if (!signatureMatches) {
                throw("Unimplemented overloaded method: " + name + "(" + incomingSignatureString + ")");
            }
        };  // obj[name]
    }
    
    // The first time _overload_is called, create overloadedMethods property
    if (typeof(obj.overloadedMethods) == 'undefined') {
        obj.overloadedMethods = {};
    }
    
    // The first time a method is added for a given name, create it
    if (typeof(obj.overloadedMethods[name]) == 'undefined') {
        obj.overloadedMethods[name] = {"signatures": []};
    }
    
    // Store the method in an associative array (hash map) keyed by the
    // signature string, e.g. "number,boolean,array":
    obj.overloadedMethods[name].signatures[signature.toString()] = method;                                                   
};  // Object._overload_ variable