/*
 * Modernizr JavaScript library 1.1
 * http://modernizr.com/
 *
 * Copyright (c) 2009 Faruk Ates - http://farukat.es/
 * Licensed under the MIT license.
 * http://modernizr.com/license/
 *
 * Featuring major contributions by
 * Paul Irish  - http://paulirish.com
 * Ben Alman   - http://benalman.com/
 */
 window.Modernizr=(function(P,l)
 {
var _='1.1', J={},T=true,ab=true,M=100,ad=l.documentElement,
 U=l.createElement("modernizr"),
 k=U.style,Z=l.createElement("input"),
 o="canvas",Y="canvastext",V="rgba",g="hsla",Q="multiplebgs",x="borderimage",
 D="borderradius",v="boxshadow",X="opacity",B="cssanimations",R="csscolumns",
 a="cssgradients",p="cssreflections",h="csstransforms",w="csstransforms3d",aa="csstransitions",
 F="fontface",K="geolocation",e="video",A="audio",d="input",u=d+"types",N="background",
 b=N+"Color",G="canPlayType",H="localstorage",j="sessionstorage",C="webworkers",
 O="applicationcache",
 c=" -o- -moz- -ms- -webkit- ".split(" "),s={},z={},r={},q,S,W,L,n=[];
 function y(f)
 {k.cssText=f}
 function E(i,f)
{
	 return y(c.join(i+";")+(f||""))
}
	 function I(i,f)
	 {return i.indexOf(f)!==-1}
	 function ac(m,ae)
	 {
		 for(var f in m)
		 {
			 if(k[m[f]]!==undefined&&(!ae||ae(m[f])))
			 {return true}
		}
	}
			 function t(ae,m)
			 {
				 var i=ae.charAt(0).toUpperCase()+ae.substr(1),f=[ae,"webkit"+i,"Moz"+i,"moz"+i,"o"+i,"ms"+i];
				 return !!ac(f,m)
			}
				 s[o]=function()
				 {return !!l.createElement(o).getContext};
				 s[Y]=function()
				 {return !!(s[o]()&&typeof l.createElement(o).getContext("2d").fillText=="function")};
				 s[K]=function()
				 {return !!navigator.geolocation};
				 s[V]=function()
				 {
					 y(N+"-color:rgba(150,255,150,.5)");
					 return I(k[b],V)
				};
						s[g]=function(){
						 y(N+"-color:hsla(120,40%,100%,.5)");
						 return I(k[b],V)
						 };
						 
						 s[Q]=function()
						 {
							 y(N+":url(m.png),url(a.png),#f99 url(m.png)");
							 return/(url\s*\(.*?){3}/.test(k[N])
						};
						s[x]=function()
							 {
								 return t("borderImage")
							};
								 s[D]=function()
								 {
									 return t("borderRadius","",function(f)
									 {
										 return I(f,"orderRadius")
									})
								};
										 s[v]=function()
										 {return t("boxShadow")};
										 s[X]=function(){y("opacity:.5");
										 return I(k[X],"0.5")};
										 s[B]=function()
										 {return t("animationName")};
										 s[R]=function()
										 {return t("columnCount")};
										 
										 s[a]=function()
										 {
											 var m=N+"-image:",i="gradient(linear,left top,right bottom,from(#9f9),to(white));",f="linear-gradient(left top,#9f9, white);";
										 y(m+i+m+"-webkit-"+i+m+"-moz-"+i+m+"-o-"+i+m+"-ms-"+i+m+f+m+"-webkit-"+f+m+"-moz-"+f+m+"-o-"+f+m+"-ms-"+f);
										 return I(k.backgroundImage,"gradient")
										 };
										 
										 s[p]=function()
										 {
											 return t("boxReflect")
										 };
										 s[h]=function()
										 {
											 return !!ac(["transformProperty","webkitTransform","MozTransform","mozTransform","oTransform","msTransform"])
										};
												 s[w]=function()
												 {
													return !!ac(["perspectiveProperty","webkitPerspective","MozPerspective","mozPerspective","oPerspective","msPerspective"])
												 };
													 s[aa]=function()
													 {
														return t("transitionProperty")
													 };
													 s[F]=(function()
													 {
																 var i;
															 if(!(!/*@cc_on@if(@_jscript_version>=5)!@end@*/0))
															 {i=true}
															 else
															 {
																		 var aj=l.createElement("style"),ae=l.createElement("span"),ak,af,ah=false,ag=l.body,ai,m;aj.textContent="@font-face{font-family:testfont;src:url('data:font/ttf;base64,AAEAAAAMAIAAAwBAT1MvMliohmwAAADMAAAAVmNtYXCp5qrBAAABJAAAANhjdnQgACICiAAAAfwAAAAEZ2FzcP//AAMAAAIAAAAACGdseWYv5OZoAAACCAAAANxoZWFk69bnvwAAAuQAAAA2aGhlYQUJAt8AAAMcAAAAJGhtdHgGDgC4AAADQAAAABRsb2NhAIQAwgAAA1QAAAAMbWF4cABVANgAAANgAAAAIG5hbWUgXduAAAADgAAABPVwb3N03NkzmgAACHgAAAA4AAECBAEsAAUAAAKZAswAAACPApkCzAAAAesAMwEJAAACAAMDAAAAAAAAgAACbwAAAAoAAAAAAAAAAFBmRWQAAAAgqS8DM/8zAFwDMwDNAAAABQAAAAAAAAAAAAMAAAADAAAAHAABAAAAAABGAAMAAQAAAK4ABAAqAAAABgAEAAEAAgAuqQD//wAAAC6pAP///9ZXAwAAAAAAAAACAAAABgBoAAAAAAAvAAEAAAAAAAAAAAAAAAAAAAABAAIAAAAAAAAAAgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABAAEACoAAAAGAAQAAQACAC6pAP//AAAALqkA////1lcDAAAAAAAAAAIAAAAiAogAAAAB//8AAgACACIAAAEyAqoAAwAHAC6xAQAvPLIHBADtMrEGBdw8sgMCAO0yALEDAC88sgUEAO0ysgcGAfw8sgECAO0yMxEhESczESMiARDuzMwCqv1WIgJmAAACAFUAAAIRAc0ADwAfAAATFRQWOwEyNj0BNCYrASIGARQGKwEiJj0BNDY7ATIWFX8aIvAiGhoi8CIaAZIoN/43KCg3/jcoAWD0JB4eJPQkHh7++EY2NkbVRjY2RgAAAAABAEH/+QCdAEEACQAANjQ2MzIWFAYjIkEeEA8fHw8QDxwWFhwWAAAAAQAAAAIAAIuYbWpfDzz1AAsEAAAAAADFn9IuAAAAAMWf0i797/8zA4gDMwAAAAgAAgAAAAAAAAABAAADM/8zAFwDx/3v/98DiAABAAAAAAAAAAAAAAAAAAAABQF2ACIAAAAAAVUAAAJmAFUA3QBBAAAAKgAqACoAWgBuAAEAAAAFAFAABwBUAAQAAgAAAAEAAQAAAEAALgADAAMAAAAQAMYAAQAAAAAAAACLAAAAAQAAAAAAAQAhAIsAAQAAAAAAAgAFAKwAAQAAAAAAAwBDALEAAQAAAAAABAAnAPQAAQAAAAAABQAKARsAAQAAAAAABgAmASUAAQAAAAAADgAaAUsAAwABBAkAAAEWAWUAAwABBAkAAQBCAnsAAwABBAkAAgAKAr0AAwABBAkAAwCGAscAAwABBAkABABOA00AAwABBAkABQAUA5sAAwABBAkABgBMA68AAwABBAkADgA0A/tDb3B5cmlnaHQgMjAwOSBieSBEYW5pZWwgSm9obnNvbi4gIFJlbGVhc2VkIHVuZGVyIHRoZSB0ZXJtcyBvZiB0aGUgT3BlbiBGb250IExpY2Vuc2UuIEtheWFoIExpIGdseXBocyBhcmUgcmVsZWFzZWQgdW5kZXIgdGhlIEdQTCB2ZXJzaW9uIDMuYmFlYzJhOTJiZmZlNTAzMiAtIHN1YnNldCBvZiBKdXJhTGlnaHRiYWVjMmE5MmJmZmU1MDMyIC0gc3Vic2V0IG9mIEZvbnRGb3JnZSAyLjAgOiBKdXJhIExpZ2h0IDogMjMtMS0yMDA5YmFlYzJhOTJiZmZlNTAzMiAtIHN1YnNldCBvZiBKdXJhIExpZ2h0VmVyc2lvbiAyIGJhZWMyYTkyYmZmZTUwMzIgLSBzdWJzZXQgb2YgSnVyYUxpZ2h0aHR0cDovL3NjcmlwdHMuc2lsLm9yZy9PRkwAQwBvAHAAeQByAGkAZwBoAHQAIAAyADAAMAA5ACAAYgB5ACAARABhAG4AaQBlAGwAIABKAG8AaABuAHMAbwBuAC4AIAAgAFIAZQBsAGUAYQBzAGUAZAAgAHUAbgBkAGUAcgAgAHQAaABlACAAdABlAHIAbQBzACAAbwBmACAAdABoAGUAIABPAHAAZQBuACAARgBvAG4AdAAgAEwAaQBjAGUAbgBzAGUALgAgAEsAYQB5AGEAaAAgAEwAaQAgAGcAbAB5AHAAaABzACAAYQByAGUAIAByAGUAbABlAGEAcwBlAGQAIAB1AG4AZABlAHIAIAB0AGgAZQAgAEcAUABMACAAdgBlAHIAcwBpAG8AbgAgADMALgBiAGEAZQBjADIAYQA5ADIAYgBmAGYAZQA1ADAAMwAyACAALQAgAHMAdQBiAHMAZQB0ACAAbwBmACAASgB1AHIAYQBMAGkAZwBoAHQAYgBhAGUAYwAyAGEAOQAyAGIAZgBmAGUANQAwADMAMgAgAC0AIABzAHUAYgBzAGUAdAAgAG8AZgAgAEYAbwBuAHQARgBvAHIAZwBlACAAMgAuADAAIAA6ACAASgB1AHIAYQAgAEwAaQBnAGgAdAAgADoAIAAyADMALQAxAC0AMgAwADAAOQBiAGEAZQBjADIAYQA5ADIAYgBmAGYAZQA1ADAAMwAyACAALQAgAHMAdQBiAHMAZQB0ACAAbwBmACAASgB1AHIAYQAgAEwAaQBnAGgAdABWAGUAcgBzAGkAbwBuACAAMgAgAGIAYQBlAGMAMgBhADkAMgBiAGYAZgBlADUAMAAzADIAIAAtACAAcwB1AGIAcwBlAHQAIABvAGYAIABKAHUAcgBhAEwAaQBnAGgAdABoAHQAdABwADoALwAvAHMAYwByAGkAcAB0AHMALgBzAGkAbAAuAG8AcgBnAC8ATwBGAEwAAAAAAgAAAAAAAP+BADMAAAAAAAAAAAAAAAAAAAAAAAAAAAAFAAAAAQACAQIAEQt6ZXJva2F5YWhsaQ==')}";
																	 l.getElementsByTagName("head")[0].appendChild(aj);
																	 ae.setAttribute("style","font:99px _,serif;position:absolute;visibility:hidden");
																	 if(!ag)
																	 {ag=ad.appendChild(l.createElement(F));ah=true}
																	 ae.innerHTML="........";ae.id="fonttest";
																	 ag.appendChild(ae);ak=ae.offsetWidth;ae.style.font="99px testfont,_,serif";
																	 i=ak!==ae.offsetWidth;
																	 var f=function()
																	 {i=J[F]=ak!==ae.offsetWidth;
																	 ad.className=ad.className.replace(/(no-)?font.*?\b/,"")+(i?" ":" no-")+F;
																	 ai&&(m=true)&&ai(i);
																	 ah&&setTimeout(
																	 function()
																	 {ag.parentNode.removeChild(ag)},50)};
																	 setTimeout(f,M)
															 }
															 J._fontfaceready=function(al)
															 {(m||i)?al(i):(ai=al)};
															 return function()
																{
																 return i||ak!==ae.offsetWidth
																 }
													})();
														 s[e]=function()
														 {
																 var i=l.createElement(e),f=!!i[G];
															 if(f)
															 {
																 f=new Boolean(f);
															 f.ogg=i[G]('video/ogg; codecs="theora, vorbis"');
															 f.h264=i[G]('video/mp4; codecs="avc1.42E01E, mp4a.40.2"')
															 }
															 return f
														 };
														 s[A]=function()
														 {
															 var i=l.createElement(A),f=!!i[G];
															 if(f)
															 {
																 f=new Boolean(f);
																 f.ogg=i[G]('audio/ogg; codecs="vorbis"');
																 f.mp3=i[G]("audio/mpeg3;");
																 f.wav=i[G]('audio/wav; codecs="1"');
																 f.m4a=i[G]("audio/x-m4a;")
															 }
																 return f
														 };
																 s[H]=function(){return"localStorage" in P};
																 s[j]=function(){return"sessionStorage" in P};
																 s[C]=function(){return !!P.Worker};
																 s[O]=function(){return !!P.applicationCache};
																 for(L in s)
																 {
																		 if(s.hasOwnProperty(L))
																		{
																		 n.push((!(J[L]=s[L]())&&ab?"no-":"")+L)
																		 }
																 }
																 J.addTest=function(f,i)
																 {
																	 if(this.hasOwnProperty(f)){}i=!!(i());
																     ad.className+=" "+(!i&&ab?"no-":"")+f;J[f]=i
																 };
																 
																 J[d]=(function(m)
																 {
																	 for(var f in m)
																	 {
																		 r[m[f]]=!!(m[f] in Z)
																		}
																		 return r
																 })
																		 ("autocomplete autofocus list placeholder max min multiple pattern required step".split(" "));
																		
																		 J[u]=(function(m)
																		 {
																				 for(var f in m)
																			 {Z.setAttribute("type",m[f]);z[m[f]]=!!(Z.type!=="text")}
																			 return z
																		 })
																		 
																		 ("search tel url email datetime date month week time datetime-local number range color".split(" "));
																		 y("");
																		 U=Z=null;
																		 if(T&&!(!/*@cc_on!@*/0))
																		 {
																			 q="abbr article aside audio canvas datalist details eventsource figure footer header hgroup mark menu meter nav output progress section time video".split(" ");
																			 W=q.length+1;
																			 while(--W)
																			 {S=l.createElement(q[W])}   
																			 S=null
																		}
																			 J._enableHTML5=T;J._enableNoClasses=ab;J._version=_;
																			 (function(f,i)
																			 {
																				 f[i]=f[i].replace(/\bno-js\b/,"js")
																			 })
																			 (ad,"className");
																			 ad.className+=" "+n.join(" ");
																			 return J
} )
 (this,this.document);
